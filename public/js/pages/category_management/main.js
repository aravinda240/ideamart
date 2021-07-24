var category = {

    // editCategory: function () {
    //     $("#catTable tbody").unbind();
    //     $("#catTable tbody").on('click', '.edit-cat', function () {
    //         $.ajax({
    //             url: path + '/get_category/' + $(this).data('id'),
    //             method: "GET",
    //             dataType: "json",
    //             success: function (data) {
    //                 $('#catFormPartWrapper').html(data.catFormData);
    //                 $('#catAppId').selectpicker('refresh');
    //                 $('#catStatus').selectpicker('refresh');
    //                 window.scrollTo(0, 0);
    //                 category.clickReset();
    //             }
    //         });
    //     });
    // },

    // changeCatApp: function () {
    //     $('#catAppId').on('change', function () {
    //         $.ajax({
    //             url: path + '/filter_category/' + $(this).val(),
    //             method: "GET",
    //             dataType: "json",
    //             success: function (data) {
    //                 $('#catTableWrapper').html(data.catTblData);
    //                 $('#catTable').DataTable({
    //                     responsive: true
    //                 });
    //                 category.resetCatForm();
    //                 category.editCategory();
    //             }
    //         });
    //     });
    // },

    changeContentApp: function () {
        $('#contentAppId').on('change', function () {
            $.ajax({
                url: path + '/filter_content/' + $(this).val(),
                method: "GET",
                dataType: "json",
                success: function (data) {
                    $('#contentCatId').html(data.catDropDown);
                    $('#contentCatId').selectpicker('refresh');
                    $('#contentTableWrapper').html(data.contentTblData);
                    $('#contentTable').dataTable({
                        responsive: true
                    });
                    category.resetContentForm();
                }
            });
        });
    },

    clickReset: function () {
        $('#resetCatForm').on('click', function () {
            $('#formAddCategory')[0].reset();
            $('#catAppId').val('').change();
            // category.resetCatForm();
        });
        $('#resetContentForm').on('click', function () {
            $('#formAddContent')[0].reset();
            $('#contentAppId').val('').change();
            // category.resetContentForm();
        });
    },

    resetCatForm: function () {
        // $('#formAddCategory')[0].reset();
        $('#catName').val('');
        $('#catStatus').val('active').change();
        $('#catId').val('');
        $('#submitCatForm').text('Create');
    },

    resetContentForm: function () {
        // $('#formAddContent')[0].reset();
        $('#contentCatId').val('').change();
        $('#content').val('');
    },

    init: function () {
        $('#catTable').dataTable({
            responsive: true
        });
        $('#contentTable').dataTable({
            responsive: true
        });
        $(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-danger").slideUp(500);
        });
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-success").slideUp(500);
        });
        $('.selectpicker').selectpicker();
        //category.editCategory();
        category.clickReset();
        category.changeContentApp();
    }
};

$(document).ready(function () {
    category.init();
});
