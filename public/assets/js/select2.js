$(document).ready(function () {});
function initializeSelect2() {
    $(".select2").select2({
        width: "100%",
        placeholder: "Select an option",
    });
    $(".summernote").summernote({
        height: 200,
        toolbar: [
            ["style", ["bold", "italic", "underline"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["insert", ["link", "picture", "video"]],
            ["view", ["codeview", "help"]],
        ],
    });
}
