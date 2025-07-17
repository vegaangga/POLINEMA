import { room } from "./module/room_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/room" || pathURL == "/admin/room/") {
        room.dataTable();
        // room.getRoomType();
        // room.storeRoom();
        room.deleteRoom();
    }

    if (pathURL == "/admin/room/create") {
        $("#fasilitas").select2({
            placeholder: "Pilih fasilitas",
            tags: true,
            allowClear: true,
            theme: "bootstrap",
            tokenSeparators: ["/", ",", ";", " "],
            createTag: function () {
                return null;
            },
        });
    }

    if (splitURL.pop() == "edit") {
        $("#fasilitas").select2({
            placeholder: "Pilih fasilitas",
            tags: true,
            allowClear: true,
            theme: "bootstrap",
            tokenSeparators: ["/", ",", ";", " "],
            createTag: function () {
                return null;
            },
        });

        var id = pathURL.split("/")[3];
        room.showFacilities(id);
    }
});
