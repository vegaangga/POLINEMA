import { handle } from "./handle_module";
class User {
    dataTable() {
        handle.setup();
        $("#table_user").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/users",
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
                    data: "email",
                    name: "email",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "address",
                    name: "address",
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

    editUser() {
        handle.setup();
        var id = "";

        $("#table_user").on("click", ".btn-edit-user", function () {
            $("#formEditUser")[0].reset();
            id = $(this).attr('data-id');
            $.get(`${APP_URL}/admin/user/${id}/edit`, function (res) {
                $("#name").val(res.data.name);
                $("#email").val(res.data.email);
                $("#address").val(res.data.address);
                $("#phone").val(res.data.phone);
            })
        });

        $("#formEditUser").on("submit", function (e) {
            e.preventDefault()
            var url = APP_URL + "/admin/user/" + id
            var data = {
                name: $("#name").val(),
                email: $("#email").val(),
                address: $("#address").val(),
                phone: $("#phone").val(),
            }
            $.ajax({
                type: "PUT",
                url: url,
                data: data,
                beforeSend: function () {
                    $("#formEditUser .btn-loading").show();
                    $("#formEditUser .btn-submit").hide();
                },
                success: function (res) {
                    $("#formEditUser .btn-loading").hide();
                    $("#formEditUser .btn-submit").show();
                    $("#table_user").DataTable().ajax.reload();
                    $("#formEditUser")[0].reset();
                    $("#editUserModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                    });
                },
                error: (e, x, settings, exception) => {
                    $("#formEditUser .btn-loading").hide();
                    $("#formEditUser .btn-submit").show();
                    handle.errorhandle(e, x, settings, exception);
                },
            });
        })
    }

    deleteUser() {
        handle.setup();
        var id = "";
        $("#table_user").on("click", ".btn-delete-user", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteUser").on("submit", function (e) {
            var url = APP_URL + "/admin/user/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteUserModal .btn-loading").show();
                    $("#deleteUserModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteUserModal .btn-loading").hide();
                    $("#deleteUserModal .btn-submit").show();
                    if (res) {
                        $("#table_user").DataTable().ajax.reload();
                        $("#deleteUserModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteUserModal .btn-loading").hide();
                    $("#deleteUserModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const user = new User();
