<div class="subscription-configuration-container d-none" id="initial_message_{{ $platform->id }}">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>
                <div class="subscription-heading">Initial Message</div>
                <textarea style="height: 250px;" class="form-group" type="text" name="{{ $platform->id }}_initial_message">@if ($pivotData) {{ $pivotData->initial_message }} @endif</textarea>
            </div>
        </div>
    </div>
</div>
