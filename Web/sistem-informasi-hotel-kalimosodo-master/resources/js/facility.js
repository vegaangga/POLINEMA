import { facility } from "./module/facility_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/facility" || pathURL == "/admin/facility/") {
        facility.dataTable();

        $("#btn-add-facility").on("click", function(){
            $("#formAddFacility")[0].reset();
            facility.storeFacility();
        })

        facility.editFacility();

        facility.deleteFacility();
        // $("#sync-facility").on("click", function () {
        //     $("#tablefacility").DataTable().ajax.reload();
        // });
    }

});
