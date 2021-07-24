commonKey = {

    init: function () {
        $('#commonKeyTable').DataTable({
            responsive: true,
            'rowsGroup': [3]
        });
        $(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-danger").slideUp(500);
        });
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-success").slideUp(500);
        });
        $('.selectpicker').selectpicker();
    }
};

$(document).ready(function () {
    commonKey.init();
});