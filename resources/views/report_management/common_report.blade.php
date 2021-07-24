@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--<h1 class="h3 mb-4 text-gray-800">{{ __('All Applications') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">App Reports</h6>
                </div>
                <div class="card-body">
                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left">
                                <table id="reportsTable" class="table table-striped table-bordered dt-responsive nowrap"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Platform</th>
                                        <th>App Name</th>
                                        <th>App USSD</th>
                                        <th>Total Active</th>
                                        <th>Total Deactive</th>
                                        <th>Base Size</th>
                                        <th>Total Pending</th>
                                        <th>Report</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($appsData) > 0)
                                        @foreach($appsData as $appData)
                                            <tr>
                                                <td>{{$appData['platform']}}</td>
                                                <td>{{$appData['name']}}</td>
                                                <td>#{{$appData['ussd_code']}}*{{$appData['ussd_keyword']}}#</td>
                                                <td>{{$appData['totalActive']}}</td>
                                                <td>{{$appData['totalInactive']}}</td>
                                                <td>{{$appData['baseSize']}}</td>
                                                <td>{{($appData['pending'] < 0)? 0 : $appData['pending']}}</td>
                                                {{--                                                <td><a href="{{'viewDailyReport'}}">Daily</a></td>--}}
                                                <td>
                                                    <a href="{{route('viewDailyReport', ['appId' => $appData['rand_id']])}}">Daily</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                    @endif
                                    <tfoot>
                                    <tr>
                                        <th>Platform</th>
                                        <th>App Name</th>
                                        <th>App USSD</th>
                                        <th>Total Active</th>
                                        <th>Total Deactive</th>
                                        <th>Base Size</th>
                                        <th>Total Pending</th>
                                        <th>Report</th>
                                    </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
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
