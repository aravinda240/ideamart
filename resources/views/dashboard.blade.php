@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        {{--        @if (count($ownedApps) > 0)--}}
        @foreach($ownedApps as $app)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success" }} shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="single-summary-app-menu">
                                <a href="{{url('app_management/edit/' . $app->id)}}" type="button">
                                    <i class="fas fa-pen"></i>
                                </a>
                                {{--<div class="dropdown">--}}
                                {{--<button class="btn btn-secondary dropdown-toggle" type="button"--}}
                                {{--id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
                                {{--aria-expanded="false">--}}
                                {{--</button>--}}
                                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                {{--<a class="dropdown-item" data-id={{$ownedApp['id']}}>Edit App <i--}}
                                {{--class="fas fa-pen"></i></a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col mr-2">
{{--                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$ownedApp['im_app_type']['name']}}</div>--}}
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$app->name}}</div>
                            </div>
                            <div class="col-auto">
                                @if (count($app->platforms))
                                    @foreach($app->platforms as $platform)
                                        <img src="{{ asset('img/'.strtolower($platform->name).'.png') }}" class="dashboard-app-img">
                                    @endforeach
                                @endif
                            </div>
{{--                            <div class="col-12 float-left no-padding">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12 float-left summary-codes">--}}
{{--                                        <div class="col-8 float-left no-padding"><i--}}
{{--                                                    class="fas fa-sms"></i><br>REG aa--}}
{{--                                        </div>--}}
{{--                                        <div class="col-4 float-left no-padding"><i--}}
{{--                                                    class="fas fa-mobile"></i><br>#aa--}}
{{--                                            *aa#--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xl-3 col-md-6 mb-4 add-new-app">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <a href="{{url('app_management/create')}}" type="button">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--@else--}}
        {{--<div class="card border-left-primary shadow h-100 py-2">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row no-gutters align-items-center">--}}
        {{--<i class="fa fa-plus"></i>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<h1>There are no application yet...!</h1>--}}
        {{--@endif--}}
    </div>
@endsection
