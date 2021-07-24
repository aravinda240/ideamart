<div class="subscription-configuration-container d-none" id="subscription_{{ $platform->id }}">
    @php
        $pivotData = null;
            if ($appDetails) {
                $doPlatform = $appDetails->platforms->find($platform->id);
                if ($doPlatform)
                    $pivotData = $doPlatform->pivot;
            }
    @endphp
    <div class="row">
        <div class="col-12 float-left text-center">
            <div class="configuration-url-holder">
                <div class="subscription-heading">{{ $platform->name }}</div>
                <div class="subscription-heading"><i
                            class="fas fa-check-double"></i> Subscription
                    Notification URL
                </div>
                <input readonly type="text" name="{{ $platform->id }}_subscription_url"
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
    <div class="row">
        <div class="col-6">
            <div>
                <div class="subscription-heading">App Id</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_subscription_app_id" id="subscription_app_id" value="@if ($pivotData) {{ $pivotData->subscription_app_id }} @endif">
            </div>
        </div>
        <div class="col-6">
            <div>
                <div class="subscription-heading">App Password/Key</div>
                <input class="form-group" type="text" name="{{ $platform->id }}_subscription_password" id="subscription_password" value="@if ($pivotData) {{ $pivotData->subscription_password }} @endif">
            </div>
        </div>
    </div>
</div>
