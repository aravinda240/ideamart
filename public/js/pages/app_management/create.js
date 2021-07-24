appCreate = {

    setActiveTab: function () {
        let activeTabIndex = -1;
        $('.application-creating-wizard .tab-pane').each(function (index) {

            if ($(this).find('.has-error').length > 0) {
                console.log($(this).find('.has-error').length);
                if (activeTabIndex === -1) {
                    activeTabIndex = index;
                }
                $('.nav-tabs a[href="#step' + (index + 1) + '"]').addClass('error-tab');
            }
        });
        $('.nav-tabs a[href="#step' + (activeTabIndex + 1) + '"]').tab('show');
    },

    activePlatformConfigs: function (obj) {
        if (obj.is(':checked')) {
            $('#sms_'+obj.val()).removeClass('d-none');
            $('#subscription_'+obj.val()).removeClass('d-none');
            $('#initial_message_'+obj.val()).removeClass('d-none');
        } else {
            $('#sms_'+obj.val()).addClass('d-none');
            $('#subscription_'+obj.val()).addClass('d-none');
            $('#initial_message_'+obj.val()).addClass('d-none');
        }
    },

    init: function () {
        appCreate.setActiveTab();

        $('.platforms').change(function(){
            appCreate.activePlatformConfigs($(this));
        })
        $('.platforms').each(function(){
            appCreate.activePlatformConfigs($(this));
        })
    }
}

$(document).ready(function () {
    appCreate.init();
});
