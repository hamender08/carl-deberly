//File input plugin
$("#input-b3").fileinput({
    theme: 'fa',
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
});

$(function () {
    //Tooltip
    $('[data-tooltip="tooltip"]').tooltip();

    //Delete Edit Page Images
    $('body').on('click', '.remove-image', function () {
        var link = $(this).attr('data-url');
        $('#exampleModal').modal('toggle');
        $(".final-remove-image").attr("href", link);
    });

    //Delete Product Code Starts Her
    $('body').on('click', '.remove-product', function () {
        var link = $(this).attr('data-url');
        $('#deleteProduct').modal('toggle');
        $(".final-remove-product").attr("href", link);
    });
    
    //delete subcategory
     $('body').on('click', '.remove-product', function () {
        var link = $(this).attr('data-url');
        $('#deleteSubCat').modal('toggle');
        $(".final-remove-product").attr("href", link);
    });
    
    //Delete Category
    $('body').on('click', '.remove-category', function () {
        var link = $(this).attr('data-url');
        $('#deleteCategory').modal('toggle');
        $(".final-remove-product").attr("href", link);
    });
    
});