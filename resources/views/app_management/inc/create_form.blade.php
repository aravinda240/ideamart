<form role="form" id="appCreateForm" action="{{ route('storeApp') }}" method="POST">
    @csrf
    <div class="tab-content py-2">
        <div class="tab-pane active" role="tabpanel" id="step1">
            <h3>Step 1</h3>
            <div class="col-12 float-left">
                <div class="col-12 col-md-6 float-left form-full-element-holder">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <div class="form-label">Application Name<span
                                    class="required-form-star"><i
                                        class="fas fa-star-of-life"></i></span></div>
                        <input type="text" id="applicationName" class="form-control"
                               name="name" placeholder="Application Name"
                               value="{{ (old('name')) ? old('name') : (isset($appDetails) ? $appDetails['name'] : '') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-12 float-left form-full-element-holder">
                    <div class="form-group {{ $errors->has('ideamart') ? 'has-error' : '' }}">
                        <div class="form-label">Platform<span
                                    class="required-form-star"><i
                                        class="fas fa-star-of-life"></i></span></div>
                        @foreach($platforms as $platform)
                            <label class="radio-container">
                                <input class="platforms" name="platforms[]" type="checkbox" value="{{ $platform->id }}"
                                       {{(isset($appDetails) && $appDetails && $appDetails->id) ? 'readonly' : ''}}
                                       class="rdo-btn radio-hidden" {{ (((is_array(old('platforms')) && in_array($platform->id, old('platforms'))) || (isset($appDetails) && $appDetails && in_array($platform->id, $appDetails->platforms->pluck('id')->toArray()))) ? 'checked' : '') }}>
                                <img src="{{ asset('img/'.$platform->name.'.png') }}"
                                     class="radio-image">
                                <i class="radio-img-check fas fa-check-circle"></i>
                            </label>
                        @endforeach
                        @if ($errors->has('platforms'))
                            <span class="text-danger">{{ $errors->first('platforms') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary next-step float-right">
                Next
            </button>
        </div>
        <div class="tab-pane" role="tabpanel" id="step2">
            <h3><i class="fas fa-envelope"></i>SMS Configuration</h3>
            @foreach($platforms as $platform)
                <div>
                    @include('app_management.inc.sms_configuration', ['platform' => $platform])
                </div>
            @endforeach
            <ul class="float-right button-list">
                <li class="list-inline-item">
                    <button type="button" class="btn btn-outline-primary prev-step">
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next-step">
                        Next
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="step3">
            <h3><i class="fas fa-envelope"></i>Subscription Configuration</h3>
            @foreach($platforms as $platform)
                <div>
                    @include('app_management.inc.subscription_configuration', ['platform' => $platform])
                </div>
            @endforeach
            <ul class="float-right button-list">
                <li class="list-inline-item">
                    <button type="button" class="btn btn-outline-primary prev-step">
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next-step">
                        Next
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="step4">
            <h3><i class="fas fa-envelope"></i>Initial Message</h3>
            @foreach($platforms as $platform)
                <div>
                    @include('app_management.inc.initial_messages', ['platform' => $platform])
                </div>
            @endforeach
            <ul class="float-right button-list">
                <li class="list-inline-item">
                    <button type="button" class="btn btn-outline-primary prev-step">
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next-step">
                        Next
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="step5">
            <h3>Complete!</h3>
            <p>You have successfully completed all steps.</p>
            <ul class="float-right button-list">
                <li class="list-inline-item">
                    <button type="button" class="btn btn-outline-primary prev-step">
                        Previous
                    </button>
                </li>
                <li class="list-inline-item">
                    <input type="hidden" name="id"
                           value="{{ (old('id')) ? old('id') : (isset($appDetails) ? $appDetails['id'] : '') }}">
                    <button type="submit" class="btn btn-primary">Finish</button>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</form>
