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

                    <div class="rounded">
                        <div class="row">
                            <div class="col-12 float-left report-form-holder">
                                <div class="col-12 col-md-4 float-left form-full-element-holder">
                                    <div class="form-label">Application<span
                                            class="required-form-star"><i
                                                class="fas fa-star-of-life"></i></span></div>
                                    <select class="selectpicker">
                                        <option data-tokens="Content Update">Smart Job Finder</option>
                                        <option data-tokens="Chatting">Loan Finder</option>
                                        <option data-tokens="Proposals">Fitness</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 float-left form-full-element-holder">
                                    <div class="form-label">Date Range<span
                                            class="required-form-star"><i
                                                class="fas fa-star-of-life"></i></span></div>
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 float-left">
                                <table id="table_daily_report" class="ui celled table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Subscribed</th>
                                        <th>Unsubscribed</th>
                                        <th>REGISTERED</th>
                                        <th>UNREGISTERED</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2020-09-01</td>
                                        <td>12</td>
                                        <td>0</td>
                                        <td>12</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>2020-09-02</td>
                                        <td>12</td>
                                        <td>0</td>
                                        <td>12</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>2020-09-03</td>
                                        <td>12</td>
                                        <td>0</td>
                                        <td>12</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>2020-09-04</td>
                                        <td>12</td>
                                        <td>0</td>
                                        <td>12</td>
                                        <td>4</td>
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
