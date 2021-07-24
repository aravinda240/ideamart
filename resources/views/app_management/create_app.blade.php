@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--    <h1 class="h3 mb-4 text-gray-800">{{ __('New Application') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create a application</h6>
                </div>

                <div class="card-body">
                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <section class="col-12 application-creating-wizard" id="formTab">
                                <ul class="nav nav-tabs flex-nowrap" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#step1" class="nav-link active" data-toggle="tab" aria-controls="step1"
                                           role="tab" title="Step 1">Step 1<br><span class="sub-heading-wizard">Initial Details</span></a>
                                    </li>

                                    <li role="presentation" class="nav-item">
                                        <a href="#step2" class="nav-link" data-toggle="tab"
                                           aria-controls="step2" role="tab" title="Step 2">Step 2<br><span
                                                    class="sub-heading-wizard">SMS Configuration</span></a>
                                    </li>

                                    <li role="presentation" class="nav-item">
                                        <a href="#step3" class="nav-link" data-toggle="tab"
                                           aria-controls="step3" role="tab" title="Step 3">Step 3<br><span
                                                    class="sub-heading-wizard">Subscription Configuration</span></a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step4" class="nav-link" data-toggle="tab"
                                           aria-controls="step4" role="tab" title="Step 4">Step 4<br><span
                                                    class="sub-heading-wizard">Initial Messages</span></a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#step5" class="nav-link" data-toggle="tab"
                                           aria-controls="step5" role="tab" title="Step 5">Step 5<br><span
                                                    class="sub-heading-wizard">Complete</span></a>
                                    </li>
{{--                                    <li role="presentation" class="nav-item">--}}
{{--                                        <a href="#step3" class="nav-link" data-toggle="tab"--}}
{{--                                           aria-controls="step3" role="tab" title="Step 3">Step 3<br><span--}}
{{--                                                    class="sub-heading-wizard">USSD Configuration</span></a>--}}
{{--                                    </li>--}}

{{--                                    <li role="presentation" class="nav-item">--}}
{{--                                        <a href="#step4" class="nav-link" data-toggle="tab"--}}
{{--                                           aria-controls="complete" role="tab" title="Complete">Step 4<br><span--}}
{{--                                                    class="sub-heading-wizard">SMS Configuration</span></a>--}}
{{--                                    </li>--}}
                                </ul>
                                <div id="createFormPart">
                                    @include('app_management/inc/create_form')
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script> path = '{{ url('app_management') }}'; </script>
    <script src="{{ asset('js/pages/app_management/create.js') }}"></script>
@endsection
