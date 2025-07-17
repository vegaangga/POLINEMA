import { handle } from "./handle_module";
class Facility {

    dataTable() {
        handle.setup()
        $("#table_facility").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/data-facility",
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
                            return "<span class='badge bg-light-success'>Aktif</span>"
                        } else {
                            return "<span class='badge bg-light-danger'>Tidak Aktif</span>";
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

    storeFacility() {
        handle.setup();
        var isActive = 0;
        $("#is_active").on('change', function () {
            $(this).is(':checked') ? isActive = 1 : isActive = 0;

        });
        $("#formAddFacility").validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: "Nama fasilitas tidak boleh kosong" },
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
                    is_active: isActive
                };
                $.ajax({
                    type: "POST",
                    url: APP_URL + "/admin/facility",
                    data: data,
                    beforeSend: function () {
                        $("#formAddFacility .btn-loading").show();
                        $("#formAddFacility .btn-submit").hide();
                    },
                    success: function (res) {
                        $("#formAddFacility .btn-loading").hide();
                        $("#formAddFacility .btn-submit").show();
                        $("#table_facility").DataTable().ajax.reload();
                        $("#formAddFacility")[0].reset();
                        $("#addFacilityModal").modal("hide")
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    },
                    error: (e, x, settings, exception) => {
                        $("#formAddFacility .btn-loading").hide();
                        $("#formAddFacility .btn-submit").show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    editFacility() {
        handle.setup();
        var id = "";
        var isActive = 0;

        $("#table_facility").on("click", ".btn-edit-facility", function () {
            $("#formEditFacility")[0].reset();
            id = $(this).attr('data-id');
            $.get(`${APP_URL}/admin/facility/${id}/edit`, function (res) {
                $("#name_edit").val(res.data.name);
                $("#description_edit").val(res.data.description);
                res.data.is_active == 1 ? $("#is_active_edit").attr("checked", true) : $("#is_active_edit").attr("checked", false);
                isActive = res.data.is_active
            })
        });
        $("#is_active_edit").on('change', function () {
            $(this).is(':checked') ? isActive = 1 : isActive = 0;
        });

        $("#formEditFacility").validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: "Nama fasilitas tidak boleh kosong" },
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
                    is_active: isActive
                };
                $.ajax({
                    type: "PUT",
                    url: APP_URL + "/admin/facility/" + id,
                    data: data,
                    beforeSend: function () {
                        $("#formEditFacility .btn-loading").show();
                        $("#formEditFacility .btn-submit").hide();
                    },
                    success: function (res) {
                        $("#formEditFacility .btn-loading").hide();
                        $("#formEditFacility .btn-submit").show();
                        $("#table_facility").DataTable().ajax.reload();
                        $("#formEditFacility")[0].reset();
                        $("#editFacilityModal").modal("hide")
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    },
                    error: (e, x, settings, exception) => {
                        $("#formEditFacility .btn-loading").hide();
                        $("#formEditFacility .btn-submit").show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }

    deleteFacility() {
        handle.setup();
        var id = "";
        $("#table_facility").on("click", ".btn-delete-facility", function () {
            id = $(this).attr('data-id');
        });
        $("#formDeleteFacility").on("submit", function (e) {
            var url = APP_URL + "/admin/facility/" + id
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteFacilityModal .btn-loading").show();
                    $("#deleteFacilityModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteFacilityModal .btn-loading").hide();
                    $("#deleteFacilityModal .btn-submit").show();
                    if (res) {
                        $("#table_facility").DataTable().ajax.reload();
                        $("#deleteFacilityModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success"
                        })
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteFacilityModal .btn-loading").hide();
                    $("#deleteFacilityModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }

}

export const facility = new Facility();
