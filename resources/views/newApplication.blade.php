@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('New Application') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create a application</h6>
                </div>

                <div class="card-body">

                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <section class="col-12 application-creating-wizard">
                                <ul class="nav nav-tabs flex-nowrap" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#step1" class="nav-link active" data-toggle="tab" aria-controls="step1"
                                           role="tab" title="Step 1">Step 1<br><span class="sub-heading-wizard">Initial Details</span></a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step2" class="nav-link disabled" data-toggle="tab"
                                           aria-controls="step2" role="tab" title="Step 2">Step 2<br><span class="sub-heading-wizard">SMS Configuration</span></a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step3" class="nav-link disabled" data-toggle="tab"
                                           aria-controls="step3" role="tab" title="Step 3">Step 3<br><span class="sub-heading-wizard">USSD Configuration</span></a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#complete" class="nav-link disabled" data-toggle="tab"
                                           aria-controls="complete" role="tab" title="Complete">Step 4<br><span class="sub-heading-wizard">Subscription Configuration</span></a>
                                    </li>
                                </ul>
                                <form role="form">
                                    <div class="tab-content py-2">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            <h3>Step 1</h3>
                                            <p>This is step 1. Click continue...</p>


                                            <div class="col-12 float-left">
                                                <div class="col-12 float-left form-full-element-holder">
                                                    <div class="form-label">Platform<span class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <label class="radio-container">
                                                        <input name="method" type="radio" class="radio-hidden" checked>
                                                        <img src="{{ asset('img/ideamart.png') }}" class="radio-image">
                                                        <i class="radio-img-check fas fa-check-circle"></i>
                                                    </label>
                                                    <label class="radio-container">
                                                        <input name="method" type="radio" class="radio-hidden">
                                                        <img src="{{ asset('img/mspace.png') }}" class="radio-image">
                                                        <i class="radio-img-check fas fa-check-circle"></i>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Application Name<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="applicationName" class="form-control"
                                                           name="app_name" placeholder="Application Name">
                                                </div>
                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Application Type<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <select class="selectpicker">
                                                        <option data-tokens="Content Update">Content Update</option>
                                                        <option data-tokens="Chatting">Chatting</option>
                                                        <option data-tokens="Proposals">Proposals</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Allowed Host Address<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="hostAddress" class="form-control"
                                                           name="host_address" placeholder="Application Name"
                                                           value="1.1.1.1" disabled>
                                                </div>
                                            </div>


                                            <button type="button" class="btn btn-primary next-step float-right">Next
                                            </button>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            <h3>Step 2</h3>
                                            <p>This is step 2</p>
                                            <div class="col-12 float-left text-center">

                                                <div class="configuration-url-holder">
                                                    <div class="subscription-heading"><i class="fas fa-sms"></i> SMS
                                                        Receiving Url
                                                    </div>
                                                    <input type="text" name="smsSubscriptionUrl" id="smsSubscriptionUrl"
                                                           class="subscription-url-text-box"
                                                           value="https://blahblahblahblahblah.com/blahblah">
                                                    <button type="button"
                                                            class="subscription-url-button btn btn-primary btn-info-full">
                                                        Copy this
                                                    </button>
                                                </div>

                                            </div>

                                            <div class="col-12 float-left">
                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Default Sender Address<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="defaultSenderAddress" class="form-control"
                                                           name="sender_address"
                                                           placeholder="Type default sender address">
                                                </div>

                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Send Address Aliases<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="SendAddressAliases" class="form-control"
                                                           name="send_address_aliases"
                                                           placeholder="Type Send address aliases">
                                                </div>


                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">SMS Short Code<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="SMSShortCode" class="form-control"
                                                           name="sms_short_code"
                                                           placeholder="Type SMS Short Code">
                                                </div>

                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">SMS Keyword<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="SMSKeyword" class="form-control"
                                                           name="sms_keyword"
                                                           placeholder="Type SMS Keyword">
                                                </div>
                                            </div>


                                            <ul class="float-right">
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-outline-primary prev-step">
                                                        Previous
                                                    </button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-primary next-step">Save and
                                                        continue
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <h3>Step 3</h3>
                                            <p>This is step 3</p>
                                            <div class="col-12 float-left text-center">

                                                <div class="configuration-url-holder">
                                                    <div class="subscription-heading"><i class="fas fa-phone-square"></i> USSD
                                                        Connection Url
                                                    </div>
                                                    <input type="text" name="USSDConnectionUrl" id="USSDConnectionUrl"
                                                           class="subscription-url-text-box"
                                                           value="https://blahblahblahblahblah.com/blahblah">
                                                    <button type="button"
                                                            class="subscription-url-button btn btn-primary btn-info-full">
                                                        Copy this
                                                    </button>
                                                </div>

                                            </div>

                                            <div class="col-12 float-left">
                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Service Code<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="ServiceCode" class="form-control"
                                                           name="service_code"
                                                           placeholder="Type Service Code">
                                                </div>
                                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                                    <div class="form-label">Keyword<span
                                                            class="required-form-star"><i
                                                                class="fas fa-star-of-life"></i></span></div>
                                                    <input type="text" id="Keyword" class="form-control"
                                                           name="keyword"
                                                           placeholder="Type Keyword">
                                                </div>






                                            </div>


                                            <ul class="float-right">
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-outline-primary prev-step">
                                                        Previous
                                                    </button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-primary next-step">Save and
                                                        continue
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-pane" role="tabpanel" id="complete">
                                            <h3>Complete!</h3>
                                            <p>You have successfully completed all steps.</p>
                                            <div class="col-12 float-left text-center">

                                                <div class="configuration-url-holder">
                                                    <div class="subscription-heading"><i class="fas fa-check-double"></i> Subscription Notification URL
                                                    </div>
                                                    <input type="text" name="SubscriptionUrl" id="SubscriptionUrl"
                                                           class="subscription-url-text-box"
                                                           value="https://blahblahblahblahblah.com/blahblah">
                                                    <button type="button"
                                                            class="subscription-url-button btn btn-primary btn-info-full">
                                                        Copy this
                                                    </button>
                                                </div>

                                            </div>

                                            <ul class="float-right">
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-outline-primary prev-step">
                                                        Previous
                                                    </button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn btn-primary">Finish</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
