$(document).ready(function () {
    CKEDITOR.replace( 'description', {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    } );
    $("#hide_menu").click(function() {
        $("#list1").toggle();
    });

});
