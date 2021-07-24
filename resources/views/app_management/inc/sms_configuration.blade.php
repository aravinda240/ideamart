<div class="sms-configuration-container d-none" id="sms_{{ $platform->id }}">
    <div class="row">
        <div class="col-12 float-left text-center">
            <div class="configuration-url-holder">
                <div class="subscription-heading">{{ $platform->name }}</div>
                <div class="subscription-heading"><i
                            class="fas fa-check-double"></i> Subscription
                    Notification URL
                </div>
                <input readonly type="text" name="{{ $platform->id }}_sms_subscription_url"
                       id="SubscriptionUrl"
                       class="subscription-url-text-box"
                       value="https://digitaltoken.website/v1/ideamart/subs">
                <button type="button"
                        class="subscription-url-button btn btn-primary btn-info-full">
                    Copy this
                </button>
            </div>
        </div>
    </div>
    @php
        $pivotData = null;
            if ($appDetails) {
                $doPlatform = $appDetails->platforms->find($platform->id);
                if ($doPlatform)
                    $pivotData = $doPlatform->pivot;
            }
    @endphp
    <div class="row">
        <div class="col-6">
            <div>
                <div class="subscription-heading">Default Sender Address</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_sms_default_sender_address" id="sms_default_sender_address" value="@if ($pivotData) {{ $pivotData->sms_default_sender_address }} @endif">
            </div>
        </div>
        <div class="col-6">
            <div>
                <div class="subscription-heading">Send Address Aliases</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_sms_send_address_aliases" id="sms_send_address_aliases" value="@if ($pivotData) {{ $pivotData->sms_send_address_aliases }} @endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div>
                <div class="subscription-heading">SMS Short Code</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_sms_short_code" id="sms_short_code" value="@if ($pivotData) {{ $pivotData->sms_short_code }} @endif">
            </div>
        </div>
        <div class="col-6">
            <div>
                <div class="subscription-heading">SMS KeyWord</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_sms_key_word" id="sms_key_word" value="@if ($pivotData) {{ $pivotData->sms_key_word }} @endif">
            </div>
        </div>
    </div>
</div>
