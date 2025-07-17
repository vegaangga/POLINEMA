import { handle } from "./handle_module";
class Reservation {
    dataTable() {
        handle.setup();
        $("#table_reservation").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/admin/reservation",
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
                    data: "room",
                    name: "room",
                },
                {
                    data: "check_in",
                    name: "check_in",
                },
                {
                    data: "check_out",
                    name: "check_out",
                },
                {
                    data: "guest",
                    name: "guest",
                },
                {
                    data: "price",
                    name: "price",
                },
                {
                    data: "status",
                    name: "status",
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

    showReservation() {
        handle.setup()
        $("#table_reservation").on("click", ".btn-show-reservation", function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: `${APP_URL}/admin/reservation/${id}`,
                beforeSend: function () {
                    $('#showReservationModal .body-status').hide();
                    $('#showReservationModal .loading').show();
                },
                success: function (res) {
                    $('#showReservationModal .loading').hide();
                    $('#showReservationModal .body-status').show();
                    $('#showReservationModal .body-status').html(res.html);
                }
            });
        });
    }

    editStatus() {
        handle.setup();
        var id = "";
        var status = 0;

        $("#table_reservation").on("click", ".btn-edit-status", function () {
            $("#formEditStatus")[0].reset();
            id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: `${APP_URL}/api/get-status/${id}`,
                beforeSend: function () {
                    $('#formEditStatus .body-status').hide();
                    $('#formEditStatus .loading').show();
                },
                success: function (res) {
                    $('#formEditStatus .loading').hide();
                    $('#formEditStatus .body-status').show();
                    res.data.status == 1 ? $("#status").attr("checked", true) : $("#status").attr("checked", false);
                    status = res.data.status
                }
            });
        });

        $("#status").on('change', function () {
            $(this).is(':checked') ? status = 1 : status = 0;
        });

        $("#formEditStatus").on("submit", function (e) {
            e.preventDefault();
            var url = APP_URL + "/admin/reservation/edit-status/" + id;

            $.ajax({
                type: "PUT",
                url: url,
                data: {
                    'status': status
                },
                beforeSend: function () {
                    $("#formEditStatus .btn-loading").show();
                    $("#formEditStatus .btn-submit").hide();
                },
                success: function (res) {
                    $("#formEditStatus .btn-loading").hide();
                    $("#formEditStatus .btn-submit").show();
                    $("#table_reservation").DataTable().ajax.reload();
                    $("#formEditStatus")[0].reset();
                    $("#editStatusModal").modal("hide")
                    Swal.fire({
                        icon: "success",
                        title: "Success"
                    })
                },
                error: (e, x, settings, exception) => {
                    $("#formEditStatus .btn-loading").hide();
                    $("#formEditStatus .btn-submit").show();
                    handle.errorhandle(e, x, settings, exception);
                },
            });
        });
    }

    deleteReservation() {
        handle.setup();
        var id = "";
        $("#table_reservation").on("click", ".btn-delete-reservation", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteReservation").on("submit", function (e) {
            var url = APP_URL + "/admin/reservation/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteReservationModal .btn-loading").show();
                    $("#deleteReservationModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteReservationModal .btn-loading").hide();
                    $("#deleteReservationModal .btn-submit").show();
                    if (res) {
                        $("#table_reservation").DataTable().ajax.reload();
                        $("#deleteReservationModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteReservationModal .btn-loading").hide();
                    $("#deleteReservationModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const reservation = new Reservation();
