import { blog } from "./module/blog_module";

$(document).ready(function () {
    const pathURL = document.location.pathname;
    const splitURL = pathURL.split("/");

    if (pathURL == "/admin/blog" || pathURL == "/admin/blog/") {
        blog.dataTable();
        blog.deleteBlog()
        blog.editBlog()
        $("#btn-add-blog").on("click", function () {
            $("#formAddBlog")[0].reset();
            blog.storeBlog();
        })
    }

});
