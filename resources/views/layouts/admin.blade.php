<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <script src="{{ asset('js/main.js') }}" defer></script>

    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Nav::isRoute('dashboard') }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span></a>
        </li>

        <!-- Nav Item - Application -->
        <li class="nav-item {{ Nav::isRoute('viewApps') }} {{ Nav::isRoute('createApp') }} {{ Nav::isRoute('viewApp') }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fab fa-adn"></i>
                <span>App Management</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{--<h6 class="collapse-header">Application Management</h6>--}}
                    <a class="collapse-item {{ Nav::isRoute('viewApps') }}" href="{{ route('viewApps') }}">My
                        Application</a>
                    <a class="collapse-item {{ Nav::isRoute('createApp') }}" href="{{ route('createApp') }}">Create
                        Application</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Content -->
        <li class="nav-item {{ Nav::isRoute('viewCategories') }} {{ Nav::isRoute('viewContents') }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
               aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-file-alt"></i>
                <span>Content Management</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{--<h6 class="collapse-header">Content Management</h6>--}}
                    <a class="collapse-item {{ Nav::isRoute('viewCategories') }}" href="{{ route('viewCategories') }}">Categories</a>
                    <a class="collapse-item {{ Nav::isRoute('viewContents') }}"
                       href="{{ route('viewContents') }}">Content</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Report -->
        <li class="nav-item {{ Nav::isRoute('viewCommonReport') }} {{ Nav::isRoute('viewDailyReport') }}">
            <a class="nav-link" href="{{ route('viewCommonReport') }}">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>{{ __('Reports') }}</span></a>
        </li>

        <!-- Nav Item - Profile -->
        <li class="nav-item {{ Nav::isRoute('otpApiKey') }}">
            <a class="nav-link" href="{{ route('otpApiKey') }}">
                <i class="fas fa-key"></i>
                <span>{{ __('Key Management') }}</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Settings') }}
        </div>


    {{--<!-- Nav Item - Application -->--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
    {{--aria-expanded="true" aria-controls="collapseTwo">--}}
    {{--<i class="fab fa-adn"></i>--}}
    {{--<span>Application</span>--}}
    {{--</a>--}}
    {{--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--<div class="bg-white py-2 collapse-inner rounded">--}}
    {{--<h6 class="collapse-header">Application Management</h6>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('viewApps') }}" href="{{ route('viewApps') }}">My--}}
    {{--Application</a>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('createApp') }}" href="{{ route('createApp') }}">Create--}}
    {{--Application</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}


    {{--<!-- Nav Item - Content -->--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"--}}
    {{--aria-expanded="true" aria-controls="collapseThree">--}}
    {{--<i class="fas fa-file-alt"></i>--}}
    {{--<span>Contents</span>--}}
    {{--</a>--}}
    {{--<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--<div class="bg-white py-2 collapse-inner rounded">--}}
    {{--<h6 class="collapse-header">Content Management</h6>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('categories') }}" href="{{ route('categories') }}">Categories</a>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('content') }}" href="{{ route('content') }}">Content</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--<!-- Nav Item - Reports -->--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"--}}
    {{--aria-expanded="true" aria-controls="collapseFour">--}}
    {{--<i class="fas fa-chart-pie"></i>--}}
    {{--<span>Reports</span>--}}
    {{--</a>--}}
    {{--<div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--<div class="bg-white py-2 collapse-inner rounded">--}}
    {{--<h6 class="collapse-header">Report Management</h6>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('viewCommonReport') }}"--}}
    {{--href="{{ route('viewCommonReport') }}">Application Report</a>--}}
    {{--<a class="collapse-item {{ Nav::isRoute('viewDailyReport') }}" href="{{ route('viewDailyReport') }}">Daily--}}
    {{--Report</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}

    <!-- Nav Item - Profile -->
        <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Profile') }}</span>
            </a>
        </li>


    {{--        <!-- Nav Item - Categories -->--}}
    {{--        <li class="nav-item {{ Nav::isRoute('categories') }}">--}}
    {{--            <a class="nav-link" href="{{ route('categories') }}">--}}
    {{--                <i class="fas fa-fw fa-hands-helping"></i>--}}
    {{--                <span>{{ __('Categories') }}</span>--}}
    {{--            </a>--}}
    {{--        </li>--}}
    {{--        <!-- Nav Item - Categories -->--}}
    {{--        <li class="nav-item {{ Nav::isRoute('content') }}">--}}
    {{--            <a class="nav-link" href="{{ route('content') }}">--}}
    {{--                <i class="fas fa-fw fa-hands-helping"></i>--}}
    {{--                <span>{{ __('Content') }}</span>--}}
    {{--            </a>--}}
    {{--        </li>--}}



    <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold"
                                    data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Alejandro RH 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>
<script src="{{ asset('js/dataTables.rowsGroup.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.min.js') }}"></script>

<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{url('/')}}";
</script>
@yield('page_scripts')
</body>
</html>
