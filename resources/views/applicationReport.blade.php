@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Reports') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-12 order-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Application Reports</h6>
                </div>

                <div class="card-body">

                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left">
                                <table id="table_app_report" class="ui celled table">
                                    <thead>
                                    <tr>
                                        <th>Plarform</th>
                                        <th>App Name</th>
                                        <th>App USSD</th>
                                        <th>Total Active</th>
                                        <th>Total Deact</th>
                                        <th>Base Size</th>
                                        <th>Total Pending</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Ideamart</td>
                                        <td>EasyWork</td>
                                        <td>#781*710#</td>
                                        <td>2013</td>
                                        <td>690</td>
                                        <td>308</td>
                                        <td>1705</td>
                                    </tr>







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
