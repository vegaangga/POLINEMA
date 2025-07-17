import { handle } from "./handle_module";
class RoomType {
    dataTable() {
        handle.setup();
        $("#table_room_type").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/data-room-type",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "description",
                    name: "description",
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

    storeRoomType() {
        handle.setup();
        var isActive = 0;
        $("#is_active").on("change", function () {
            $(this).is(":checked") ? (isActive = 1) : (isActive = 0);
        });
        $("#formAddRoomType").validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: "Nama tipe kamar tidak boleh kosong" },
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
            submitHandler: function () {
                var data = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                    is_active: isActive,
                };
                $.ajax({
                    type: "POST",
                    url: APP_URL + "/admin/room-type",
                    data: data,
                    beforeSend: function () {
                        $("#formAddRoomType .btn-loading").show();
                        $("#formAddRoomType .btn-submit").hide();
                    },
                    success: function (res) {
                        $("#formAddRoomType .btn-loading").hide();
                        $("#formAddRoomType .btn-submit").show();
                        $("#table_room_type").DataTable().ajax.reload();
                        $("#formAddRoomType")[0].reset();
                        $("#addRoomTypeModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    },
                    error: (e, x, settings, exception) => {
                        $("#formAddRoomType .btn-loading").hide();
                        $("#formAddRoomType .btn-submit").show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    editRoomType() {
        handle.setup();
        var id = "";
        var isActive = 0;

        $("#table_room_type").on("click", ".btn-edit-room-type", function () {
            $("#formEditRoomType")[0].reset();
            id = $(this).attr("data-id");
            $.get(`${APP_URL}/admin/room-type/${id}/edit`, function (res) {
                $("#name_edit").val(res.data.name);
                $("#description_edit").val(res.data.description);
                res.data.is_active == 1
                    ? $("#is_active_edit").attr("checked", true)
                    : $("#is_active_edit").attr("checked", false);
                isActive = res.data.is_active;
            });
        });
        $("#is_active_edit").on("change", function () {
            $(this).is(":checked") ? (isActive = 1) : (isActive = 0);
        });

        $("#formEditRoomType").validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: "Nama tipe kamar tidak boleh kosong" },
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
            submitHandler: function () {
                var data = {
                    name: $("#name_edit").val(),
                    description: $("#description_edit").val(),
                    is_active: isActive,
                };
                $.ajax({
                    type: "PUT",
                    url: APP_URL + "/admin/room-type/" + id,
                    data: data,
                    beforeSend: function () {
                        $("#formEditRoomType .btn-loading").show();
                        $("#formEditRoomType .btn-submit").hide();
                    },
                    success: function (res) {
                        $("#formEditRoomType .btn-loading").hide();
                        $("#formEditRoomType .btn-submit").show();
                        $("#table_room_type").DataTable().ajax.reload();
                        $("#formEditRoomType")[0].reset();
                        $("#editRoomTypeModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    },
                    error: (e, x, settings, exception) => {
                        $("#formEditRoomType .btn-loading").hide();
                        $("#formEditRoomType .btn-submit").show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    deleteRoomType() {
        handle.setup();
        var id = "";
        $("#table_room_type").on("click", ".btn-delete-room-type", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteRoomType").on("submit", function (e) {
            var url = APP_URL + "/admin/room-type/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteRoomTypeModal .btn-loading").show();
                    $("#deleteRoomTypeModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteRoomTypeModal .btn-loading").hide();
                    $("#deleteRoomTypeModal .btn-submit").show();
                    if (res) {
                        $("#table_room_type").DataTable().ajax.reload();
                        $("#deleteRoomTypeModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteRoomTypeModal .btn-loading").hide();
                    $("#deleteRoomTypeModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const room_type = new RoomType();
