import { handle } from "./handle_module";
class Blog {

    dataTable() {
        handle.setup()
        $("#table_blog").DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: APP_URL + "/api/blog",
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: "text-center",
                    width: "4%",
                },
                {
                    data: "image",
                    render: function (data) {
                        if (data != null) {
                            var img = `${APP_URL}/blog/${data}`;
                            return (
                                '<img src="' +
                                img +
                                '" class="img-responsive" style="width: 100px"/>'
                            );
                        } else {
                            return "";
                        }
                    },
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "content",
                    name: "content",
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

    storeBlog() {
        handle.setup();
        let isActive = 0;
        $("#is_active").on("change", function () {
            $(this).is(":checked") ? (isActive = 1) : (isActive = 0);
        });
        $("#formAddBlog").validate({
            rules: {
                title: { required: true },
                content: { required: true },
                image: { required: true, extension: "jpg|jpeg|png" },
            },
            messages: {
                title: { required: "Judul blog tidak boleh kosong" },
                content: { required: "Konten blog tidak boleh kosong" },
                image: {
                    required: "Gambar tidak boleh kosong",
                    extension: "Format gambar harus berupa JPG|JPEG|PNG",
                },
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
            submitHandler: function (form) {
                var image = $("#image")[0].files;
                if (image.length > 0) {
                    var fileExtension = ["jpeg", "jpg", "png"];
                    var getExtension = image[0]["name"]
                        .split(".")
                        .pop()
                        .toLowerCase();
                    var getSize = image[0]["size"];
                    if ($.inArray(getExtension, fileExtension) == -1) {
                        Swal.fire({
                            icon: "error",
                            title:
                                "Format gambar harus berupa " +
                                fileExtension.join(", "),
                        });
                    } else if (getSize > 5000000) {
                        Swal.fire({
                            icon: "error",
                            title: "Ukuran gambar maksimum 5MB",
                        });
                    } else {
                        var data = {
                            title: $("#title").val(),
                            content: $("#content").val(),
                            image: image,
                            is_active: isActive,
                        };
                        $.ajax({
                            type: "POST",
                            url: APP_URL + "/admin/blog",
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: new FormData(form),
                            beforeSend: function () {
                                $("#formAddBlog .btn-loading").show();
                                $("#formAddBlog .btn-submit").hide();
                            },
                            success: function (res) {
                                $("#formAddBlog .btn-loading").hide();
                                $("#formAddBlog .btn-submit").show();
                                $("#table_blog").DataTable().ajax.reload();
                                $("#formAddBlog")[0].reset();
                                $("#addBlogModal").modal("hide");
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                });
                            },
                            error: (e, x, settings, exception) => {
                                $("#formAddBlog .btn-loading").hide();
                                $("#formAddBlog .btn-submit").show();
                                handle.errorhandle(e, x, settings, exception);
                            },
                        });
                    }
                }
            },
        });
    }

    editBlog() {
        handle.setup();
        var id = "";
        var isActive = 0;

        $("#table_blog").on("click", ".btn-edit-blog", function () {
            $("#formEditBlog")[0].reset();
            id = $(this).attr('data-id');
            $.get(`${APP_URL}/admin/blog/${id}/edit`, function (res) {
                $("#title_edit").val(res.data.title);
                $("#content_edit").val(res.data.content);
                res.data.is_active == 1 ? $("#is_active_edit").attr("checked", true) : $("#is_active_edit").attr("checked", false);
                isActive = res.data.is_active
            })
        });
        $("#is_active_edit").on('change', function () {
            $(this).is(':checked') ? isActive = 1 : isActive = 0;
        });

        $("#formEditBlog").validate({
            rules: {
                title: { required: true },
                content: { required: true },
            },
            messages: {
                title: { required: "Judul blog tidak boleh kosong" },
                content: { required: "Konten blog tidak boleh kosong" },
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
                var url = APP_URL + "/admin/blog/" + id
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: {
                        title: $('#title_edit').val(),
                        content: $('#content_edit').val(),
                        is_active: isActive,
                    },
                    beforeSend: function () {
                        $("#formEditBlog .btn-loading").show();
                        $("#formEditBlog .btn-submit").hide();
                    },
                    success: function (res) {
                        $("#formEditBlog .btn-loading").hide();
                        $("#formEditBlog .btn-submit").show();
                        $("#table_blog").DataTable().ajax.reload();
                        $("#formEditBlog")[0].reset();
                        $("#editBlogModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    },
                    error: (e, x, settings, exception) => {
                        $("#formEditBlog .btn-loading").hide();
                        $("#formEditBlog .btn-submit").show();
                        handle.errorhandle(e, x, settings, exception);
                    },
                });
            },
        });
    }


    deleteBlog() {
        handle.setup();
        var id = "";
        $("#table_blog").on("click", ".btn-delete-blog", function () {
            id = $(this).attr("data-id");
        });
        $("#formDeleteBlog").on("submit", function (e) {
            var url = APP_URL + "/admin/blog/" + id;
            var form = $(this);
            $.ajax({
                url: url,
                type: "DELETE",
                data: form.serialize(),
                beforeSend: function () {
                    $("#deleteBlogModal .btn-loading").show();
                    $("#deleteBlogModal .btn-submit").hide();
                },
                success: function (res) {
                    $("#deleteBlogModal .btn-loading").hide();
                    $("#deleteBlogModal .btn-submit").show();
                    if (res) {
                        $("#table_blog").DataTable().ajax.reload();
                        $("#deleteBlogModal").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                        });
                    }
                },
                error: (e, x, settings, exception) => {
                    $("#deleteBlogModal .btn-loading").hide();
                    $("#deleteBlogModal .btn-submit").show();
                    var msg = "Hapus data gagal ";
                    handle.errorhandle(e, x, settings, exception, msg);
                },
            });
            e.preventDefault();
        });
    }
}

export const blog = new Blog();
