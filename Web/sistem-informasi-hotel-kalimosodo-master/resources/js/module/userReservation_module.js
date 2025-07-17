import { handle } from "./handle_module";
class UserReservation {
    dataTable() {
        handle.setup();
        $("#table_reservation").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/user/reservation",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
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
                url: `${APP_URL}/user/reservation/${id}`,
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

    deleteReservation() {
        handle.setup();
        var id = "";
        $("#table_reservation").on("click", ".btn-delete-reservation", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteReservation").on("submit", function (e) {
            var url = APP_URL + "/user/reservation/" + id;
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

export const userReservation = new UserReservation();
