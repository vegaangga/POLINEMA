import { room_type } from "./module/room_type_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/room-type" || pathURL == "/admin/room-type/") {
        room_type.dataTable();

        $("#btn-add-room-type").on("click", function () {
            $("#formAddRoomType")[0].reset();
            room_type.storeRoomType();
        });

        room_type.editRoomType();

        room_type.deleteRoomType();
        // $("#sync-room_type").on("click", function () {
        //     $("#tableroom_type").DataTable().ajax.reload();
        // });
    }
});
