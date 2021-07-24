@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Categories') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-12 order-lg-12">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create A Categories</h6>
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
                                        <div class="form-label">Category<span
                                                class="required-form-star"><i
                                                    class="fas fa-star-of-life"></i></span></div>
                                        <select class="selectpicker">
                                            <option data-tokens="Content Update">Gov Jobs</option>
                                            <option data-tokens="Chatting">Private Jobs</option>
                                        </select>
                                    </div>

                                    <div class="col-12 float-left form-full-element-holder">
                                        <div class="form-label">Content<span
                                                class="required-form-star"><i
                                                    class="fas fa-star-of-life"></i></span></div>
                                        <textarea type="text" id="category_content" class="form-control"
                                                  name="cat_content" placeholder="Category Name"></textarea>
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
                                    <table id="table_id_content" class="ui celled table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Content</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Gov Jobs</td>
                                            <td>We are Hiring Part Time/Full Time Creative Content Writer in Sri Lanka Please submit your CV to info@seosrilanka.net Responsibilities : * Research for articles * Write creative pieces about Search Engine Marketing, digital marketing and technology * Collaborate with marketing and social media teams to create great content * Submit articles according to deadlines * Edit articles as appropriate Requirements The ideal candidate will: * Be currently studying at a university with a focus in Journalism, English or Creative Writing ability * Have excellent communication skills – written, verbal in English * Have strong attention to detail * Keen interest in digital Marketing technology. * Exceptional work ethic * Good research and internet skills * Good at working to deadlines * Portfolio of previous work to demonstrate transferable skills for the position offered Please submit your CV to info@seosrilanka.net and tell us briefly why you are the right candidate for the position.</td>
                                            <td>2020-02-15</td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-info-full    ">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Private Jobs</td>
                                            <td>We are Hiring Part Time/Full Time Creative Content Writer in Sri Lanka Please submit your CV to info@seosrilanka.net Responsibilities : * Research for articles * Write creative pieces about Search Engine Marketing, digital marketing and technology * Collaborate with marketing and social media teams to create great content * Submit articles according to deadlines * Edit articles as appropriate Requirements The ideal candidate will: * Be currently studying at a university with a focus in Journalism, English or Creative Writing ability * Have excellent communication skills – written, verbal in English * Have strong attention to detail * Keen interest in digital Marketing technology. * Exceptional work ethic * Good research and internet skills * Good at working to deadlines * Portfolio of previous work to demonstrate transferable skills for the position offered Please submit your CV to info@seosrilanka.net and tell us briefly why you are the right candidate for the position.</td>
                                            <td>2020-02-30</td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-info-full    ">
                                                    <i class="fas fa-trash"></i>
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
