import { handle } from "./handle_module";
class Room {
    dataTable() {
        handle.setup();
        $("#table_room").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/room",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
                },
                {
                    data: "image",
                    render: function (data) {
                        if (data != null) {
                            var img = `${APP_URL}/room/${data}`;
                            return (
                                '<img src="' +
                                img +
                                '" class="img-responsive" style="width: 100px"/>'
                            );
                        } else {
                            return "";
                        }
                    },
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "room_type",
                    name: "room_type",
                },
                {
                    data: "price",
                    name: "price",
                },
                {
                    data: "is_active",
                    render: function (data) {
                        if (data == 1) {
                            return "<span class='badge bg-light-success'>Active</span>";
                        } else {
                            return "<span class='badge bg-light-danger'>Non Active</span>";
                        }
                    },
                },
                {
                    data: "action",
                    name: "action",
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    }

    getRoomType() {
        handle.setup();
        $("#btn-add-room").on("click", function () {
            $.get(`${APP_URL}/api/data-room-type`, function (res) {
                var room_type = res.data;
                var select = $("#room_type_id");
                // select.empty();

                $.each(room_type, function (index, rt) {
                    var content =
                        '<option value="' +
                        rt.id +
                        '">' +
                        rt.name +
                        "</option>";
                    select.append(content);
                });
            });
        });
    }

    storeRoom() {
        handle.setup();
        var isActive = 0;
        $("#is_active").on("change", function () {
            $(this).is(":checked") ? (isActive = 1) : (isActive = 0);
        });
        $("#formAddRoom").validate({
            rules: {
                room_type: { required: true },
                name: { required: true },
                price: { required: true },
                image: { required: true, extension: "jpg|jpeg|png" },
            },
            messages: {
                room_type: { required: "Tipe kamar tidak boleh kosong" },
                name: { required: "Nama kamar tidak boleh kosong" },
                price: { required: "Harga tidak boleh kosong" },
                image: {
                    required: "Gambar tidak boleh kosong",
                    extension: "Format gambar harus berupa JPG|JPEG|PNG",
                },
            },
            errorElement: "span",
            errorPlacement: (error, element) => {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: (element, errorClass, validClass) => {
                $(element).addClass("is-invalid");
            },
            unhighlight: (element, errorClass, validClass) => {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (e) {
                var image = $("#image")[0].files;
                if (image.length > 0) {
                    var fileExtension = ["jpeg", "jpg", "png"];
                    var getExtension = image[0]["name"]
                        .split(".")
                        .pop()
                        .toLowerCase();
                    var getSize = image[0]["size"];
                    if ($.inArray(getExtension, fileExtension) == -1) {
                        Swal.fire({
                            icon: "error",
                            title:
                                "Format gambar harus berupa " +
                                fileExtension.join(", "),
                        });
                    } else if (getSize > 5000000) {
                        Swal.fire({
                            icon: "error",
                            title: "Ukuran gambar maksimum 5MB",
                        });
                    } else {
                        var data = {
                            name: $("#name").val(),
                            room_type_id: $("#room_type").val(),
                            price: $("#price").val(),
                            description: $("#description").val(),
                            price: $("#price").val(),
                            image: image,
                            is_active: isActive,
                        };
                        $.ajax({
                            type: "POST",
                            url: APP_URL + "/admin/room",
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: data,
                            beforeSend: function () {
                                $("#formAddRoom .btn-loading").show();
                                $("#formAddRoom .btn-submit").hide();
                            },
                            success: function (res) {
                                console.log(res);
                                $("#formAddRoom .btn-loading").hide();
                                $("#formAddRoom .btn-submit").show();
                                $("#table_room").DataTable().ajax.reload();
                                $("#formAddRoom")[0].reset();
                                $("#addRoomModal").modal("hide");
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                });
                            },
                            error: (e, x, settings, exception) => {
                                $("#formAddRoom .btn-loading").hide();
                                $("#formAddRoom .btn-submit").show();
                                handle.errorhandle(e, x, settings, exception);
                            },
                        });
                    }
                }
            },
        });
    }

    showFacilities(id) {
        handle.setup();
        $.get(`${APP_URL}/api/room-has-facilities/${id}`, function (res) {
            $.each(res, function (i, e) {
                $("#fasilitas option[value='" + e + "']")
                    .prop("selected", true)
                    .trigger("change");
            });
        })
    }

    deleteRoom() {
        handle.setup();
        var id = "";
        $("#table_room").on("click", ".btn-delete-room", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteRoom").on("submit", function (e) {
            var url = APP_URL + "/admin/room/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteRoomModal .btn-loading").show();
                    $("#deleteRoomModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteRoomModal .btn-loading").hide();
                    $("#deleteRoomModal .btn-submit").show();
                    if (res) {
                        $("#table_room").DataTable().ajax.reload();
                        $("#deleteRoomModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteRoomModal .btn-loading").hide();
                    $("#deleteRoomModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const room = new Room();
