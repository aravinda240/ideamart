@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('All Applications') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-12 order-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My created applications</h6>
                </div>

                <div class="card-body">

                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left">
                                <table id="table_id" class="ui celled table">
                                    <thead>
                                    <tr>
                                        <th>APP ID</th>
                                        <th>APP Password /Key</th>
                                        <th>App Name</th>
                                        <th>USSD Code</th>
                                        <th>SMS Keyword</th>
                                        <th>SMS Short Code</th>
                                        <th>App Type</th>
                                        <th>Platform</th>
                                        <th>Billing Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><button type="button"
                                                    class="btn btn-primary btn-info-full">
                                                +
                                            </button>
                                        </td>
                                        <td>***********</td>
                                        <td>BLAH</td>
                                        <td>#123*123*</td>
                                        <td>sdasd</td>
                                        <td>weq</td>
                                        <td>Content Update</td>
                                        <td>Ideamart</td>
                                        <td>Rs 5000.00</td>
                                        <td><button type="button"
                                                    class="btn btn-primary btn-info-full">
                                                <i class="fas fa-edit"></i>
                                            </button></td>
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
