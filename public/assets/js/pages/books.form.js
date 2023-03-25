$(function () {
    $("#book-image-uploader").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#book-image-preview").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
