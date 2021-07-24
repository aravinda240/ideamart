@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--<h1 class="h3 mb-4 text-gray-800">{{ __('All Applications') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My created applications</h6>
                </div>
                <div class="card-body">
                    @include('common_inc/errors_container')
                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left" id="appTableContainer">
                                @include('app_management/inc/app_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="appKeyPassModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appKeyPassModalHeader"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="popupAppIdKeyMsg"></div>
                        <form method="POST" id="formAddAppIdKey" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="pl-lg-4">
                                <div class="row">
                                    <input type="hidden" id="txtRandId" name="rand_id" value="">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Application ID<span
                                                        class="small text-danger">*</span></label>
                                            <input type="text" id="app_id" class="form-control" name="app_id"
                                                   placeholder="Type Application ID" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="last_name">Application Key<span
                                                        class="small text-danger">*</span></label>
                                            <input type="text" id="app_password" class="form-control"
                                                   name="app_password"
                                                   placeholder="Type Application Key" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="btnAddAppIdKey" class="btn btn-primary">Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script> path = '{{ url('app_management') }}'; </script>
    <script src="{{ asset('js/pages/app_management/main.js') }}"></script>
@endsection
