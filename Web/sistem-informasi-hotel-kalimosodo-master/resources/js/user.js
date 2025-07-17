import { user } from "./module/user_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/user" || pathURL == "/admin/user/") {
        user.dataTable();
        user.editUser();
        user.deleteUser();
    }
});
