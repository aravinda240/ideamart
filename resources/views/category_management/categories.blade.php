@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--<h1 class="h3 mb-4 text-gray-800">{{ __('Categories') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create A Category</h6>
                </div>
                <div class="card-body">
                    @include('common_inc/errors_container')
                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left">
                                <form method="POST" role="form" id="formAddCategory"
                                      action="{{ route('addCategory') }}" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div id="catFormPartWrapper">
                                        @include('category_management/inc/cat_form_part')
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 float-left" id="catTableWrapper">
                                @include('category_management/cat_tbl_container')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script> path = '{{ url('category_management') }}'; </script>
    <script src="{{ asset('js/pages/category_management/main.js') }}"></script>
@endsection
