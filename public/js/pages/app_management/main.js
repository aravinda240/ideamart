app = {

    editApp: function () {
        $("#appsTable").unbind();
        $("#appsTable").on('click', '.edit-app', function () {
            const id = $(this).data('id');
            $.ajax({
                url: path + '/view/' + id,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $('#createFormPart').html(data.formPart);
                }
            });
        });
    },

    showAppIdKeyModal: function () {
        $('#appKeyPassModal').on('show.bs.modal', function (event) {
            var appId = $(event.relatedTarget).data('rand_id');
            var headerName = $(event.relatedTarget).data('name');
            $("#appKeyPassModalHeader").text('Add Application Id and Key - ' + headerName);
            $("#txtRandId").val(appId);
        });
    },


    addAppIdKey: function () {
        $('#btnAddAppIdKey').on('click', function (e) {
            e.preventDefault();
            const formData = $('#formAddAppIdKey').serialize();
            app.clearErrors();
            console.log(formData);
            $.ajax({
                url: path + '/add_app_id_key',
                type: "POST",
                dataType: "json",
                data: formData,
                success: function (result) {
                    console.log(result.success);
                    const alertClass = (result.success) ? 'success' : 'danger';
                    const message = (result.success) ? 'Application id and key successfully added.' : 'Application id not found. Please try again later';
                    var messageHtml = '<div class="alert alert-' + alertClass + '" data-auto-dismiss role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span' +
                        'aria-hidden="true">&times;</span></button>' + message + '</div>';
                    if (result.success) {
                        $("#appKeyPassModal .close").click();
                        $('#appTableContainer').html(result.appTblData);
                        $('#appsTable').dataTable().show();
                        $('.manual-error-msg').html(messageHtml);
                    } else {
                        $('#popupAppIdKeyMsg').html(messageHtml);
                    }
                    app.alertAutoClose();
                },
                error: function (err) {
                    if (err.status == 422) {
                        const errors = err.responseJSON.errors;
                        $.each(errors, function (i, error) {
                            const el = $('#formAddAppIdKey').find('[name="' + i + '"]');
                            el.after($('<span class="manual-error" style="color: red;">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        });
    },

    alertAutoClose: function () {
        setTimeout(function () {
            $('.alert').fadeTo(3000, 0).slideUp(2000, function () {
                $(this).remove();
            });
        }, 2000);
    },

    clearErrors: function () {
        $(".manual-error").remove();
    },

    init: function () {
        $('#appsTable').DataTable({
            responsive: true
        });
        $(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-danger").slideUp(500);
        });
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-success").slideUp(500);
        });
        app.editApp();
        app.showAppIdKeyModal();
        app.addAppIdKey();
    }
};

$(document).ready(function () {
    app.init();
});