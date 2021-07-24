@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{--<h1 class="h3 mb-4 text-gray-800">{{ __('Key Management') }}</h1>--}}

    <div class="row justify-content-center">
        <div class="col-lg-12 order-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create A Common Key</h6>
                </div>
                <div class="card-body">
                    @include('common_inc/errors_container')
                    <div class="py-3 my-3 rounded">
                        <div class="row default-form-container">
                            <div class="col-12 float-left">
                                <form method="POST" role="form" id="formCreateApiKey"
                                      action="{{ route('generateKey') }}"
                                      autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="col-12 col-md-6 float-left form-full-element-holder">
                                        <div class="form-label">ideamart Application<span
                                                    class="required-form-star"><i
                                                        class="fas fa-star-of-life"></i></span></div>
                                        <select id="ideamartAppId" name="ideamartAppId" class="selectpicker"
                                                title="Select ideamart app">
                                            @if (count($ideamartApps) > 0)
                                                @foreach($ideamartApps as $ideamartApp)
                                                    {{--                                                    <option value="{{$ideamartApp['id']}}">{{$ideamartApp['name']}}</option>--}}
                                                    <option value={{$ideamartApp['id']}} {{(old('ideamartAppId') == $ideamartApp['id']) ? 'selected' : ''}} > {{$ideamartApp['name']}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">{{ $errors->first('ideamartAppId') }}</span>
                                    </div>

                                    <div class="col-12 col-md-6 float-left form-full-element-holder">
                                        <div class="form-label">mSpace Application<span
                                                    class="required-form-star"><i
                                                        class="fas fa-star-of-life"></i></span></div>
                                        <select id="mspaceAppId" name="mspaceAppId" class="selectpicker"
                                                title="Select mspace app">
                                            @if (count($mspaceApps) > 0)
                                                @foreach($mspaceApps as $mspaceApp)
                                                    {{--                                                    <option value="{{$mspaceApp['id']}}">{{$mspaceApp['name']}}</option>--}}
                                                    <option value={{$mspaceApp['id']}} {{(old('mspaceAppId') == $mspaceApp['id']) ? 'selected' : ''}} > {{$mspaceApp['name']}} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">{{ $errors->first('mspaceAppId') }}</span>
                                    </div>
                                    <div class="col-12 float-left form-full-element-holder">
                                        <button type="submit" class="btn btn-primary next-step float-right">Create
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 float-left">
                                <div class="col-12 float-left">
                                    <table id="commonKeyTable"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Platform</th>
                                            <th>APP NAME & ID</th>
                                            <th>Key</th>
                                            <th>Common Key</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($commonDataTbl))
                                            @foreach($commonDataTbl as $commonData)
                                                <tr>
                                                    <td>{{$commonData['im_apps']['platform']}}</td>
                                                    <td>{{$commonData['im_apps']['app_id']. ' - ' .$commonData['im_apps']['name']}}</td>
                                                    <td>{{$commonData['im_apps']['rand_id']}}</td>
                                                    <td class="mapped-key-td">{{$commonData['mapped_key']}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
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
@section('page_scripts')
    <script> path = '{{ url('/') }}'; </script>
    <script src="{{ asset('js/pages/common_key/main.js') }}"></script>
@endsection
