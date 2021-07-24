@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Categories') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-12 order-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create A Category</h6>
                </div>

                <div class="card-body">

                    <div class="py-3 my-3 rounded">
                        <div class="row">
                            <div class="col-12 float-left">
                                <div class="col-12 float-left">
                                    <div class="col-12 col-md-6 float-left form-full-element-holder">
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
                                        <div class="form-label">Category Name<span
                                                class="required-form-star"><i
                                                    class="fas fa-star-of-life"></i></span></div>
                                        <input type="text" id="categoryName" class="form-control"
                                               name="cat_name" placeholder="Category Name">
                                    </div>
                                    <div class="col-12 col-md-6 float-left form-full-element-holder">
                                        <div class="form-label">Category Status<span
                                                class="required-form-star"><i
                                                    class="fas fa-star-of-life"></i></span></div>
                                        <select class="selectpicker">
                                            <option data-tokens="Content Update">Active</option>
                                            <option data-tokens="Chatting">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12 float-left form-full-element-holder">
                                        <button type="button" class="btn btn-primary next-step float-right">Create
                                        </button>
                                    </div>

                                </div>                                

                            </div>


                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="row justify-content-center">

<div class="col-lg-12 order-lg-12">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        </div>

        <div class="card-body">

            <div class="py-3 my-3 rounded">
                <div class="row">
                    <div class="col-12 float-left">
                        
                        <div class="col-12 float-left">
                            <table id="table_id_categories" class="ui celled table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gov Jobs</td>
                                    <td>Active</td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-primary btn-info-full">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Private Jobs</td>
                                    <td>Inactive</td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-primary btn-info-full">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
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

</div>

@endsection
