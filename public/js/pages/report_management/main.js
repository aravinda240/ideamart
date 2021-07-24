report = {

    dateTimePicketInit: function () {
        var start = moment().startOf('month');
        var end = moment();

        function cb(start, end) {
            $('#reportFilter span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }

        $('#reportFilter').daterangepicker({
            startDate: start,
            endDate: end,
            separator: ' to ',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    },

    tablesInit: function () {
        $('#reportsTable').DataTable({
            responsive: true
        });

        $('#dailyReportsTable').DataTable({
            responsive: true
        });
    },

    filterReport: function () {
        $('#filterReport').on('click', function () {
            const fromDate = moment($('#reportFilter').data('daterangepicker').startDate._d).format('YYYY-MM-DD');
            const toDate = moment($('#reportFilter').data('daterangepicker').endDate._d).format('YYYY-MM-DD');
            const appId = $(this).data('id');

            $.ajax({
                url: base_url + '/report_management/filterDaily/' + appId + '/' + fromDate + '/' + toDate,
                type: 'GET',
                success: function (data) {
                    $('#dailyReportsTableWrapper').html(data);
                    $('#dailyReportsTable').DataTable({
                        responsive: true
                    });
                }
            });
        });
    },

    init: function () {
        report.dateTimePicketInit();
        report.tablesInit();
        report.filterReport();
    }
};

$(document).ready(function () {
    report.init();
});