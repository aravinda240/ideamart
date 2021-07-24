@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--<h1 class="h3 mb-4 text-gray-800">{{ __('All Applications') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daily App Reports</h6>
                </div>
                <div class="card-body">
                    <div class="py-3 rounded">
                        <div class="row">
                            <div class="col-12">
                                <div class="date-range-container">
                                    <div id="reportFilter" class="date-range-content-wrapper">
                                        <div class="date-range-content">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span>
                                            <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-filter-report" id="filterReport"
                                            data-id="{{$appId}}">Filter
                                    </button>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-12 float-left" id="dailyReportsTableWrapper">
                                @include('report_management.daily_report_table', ['reportData' => $reportData, 'footerData' => $footerData])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script> path = '{{ url('report_management') }}'; </script>
    <script src="{{ asset('js/pages/report_management/main.js') }}"></script>
@endsection
