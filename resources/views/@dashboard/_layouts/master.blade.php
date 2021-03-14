<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('page_title')</title>
    <link href="{{ url('assets_dashboard/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ url('assets_dashboard/css/alerts.css') }}" rel="stylesheet" />
    <link href="{{ url('assets_dashboard/css/loader.css') }}" rel="stylesheet" />
    <link href="{{ url('assets_dashboard/vendor/datatables/1.10.22/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ url('assets_dashboard/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ url('assets_dashboard/img/favicon.png') }}" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection__rendered {
            line-height: 30px !important;
        }
        .select2-container .select2-selection--single {
            height: 44px !important;
        }
        .select2-selection__arrow {
            height: 44px !important;
        }
    </style>
    @yield('head_styles')

    <script src="{{ url('assets_dashboard/vendor/font-awesome/5.15.1/js/all.min.js') }}" crossorigin="anonymous" data-search-pseudo-elements defer></script>
    <script src="{{ url('assets_dashboard/vendor/feather-icons/4.28.0/feather.min.js') }}" crossorigin="anonymous"></script>

    @yield('head_scripts')
</head>
<body class="nav-fixed">
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand text-danger" href="{{ route('dashboard.home') }}">
        <img style="width: 90px;height: 32px" src="{{ url('assets_public/img/logo-dark.png') }}" alt="Cayshly"/> Dashboard
    </a>
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle">
        <i data-feather="menu"></i>
    </button>
    <!-- Navbar Search Input-->
    <!-- * * Note: * * Visible only on and above the md breakpoint-->
{{--    <form class="form-inline mr-auto d-none d-md-block mr-3">--}}
{{--        <div class="input-group input-group-joined input-group-solid">--}}
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />--}}
{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text"><i data-feather="search"></i></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
    <a class="btn btn-transparent-dark" target="_blank" href="{{ route('public.home') }}">
        <i data-feather="globe"></i> &nbsp; Website
    </a>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ml-auto">
        <!-- User Dropdown-->
        <li class="nav-item mr-2">
            @foreach (auth()->user()->roles as $role)
                <span class="badge {{ $role->class }}">{{ $role->name }}</span>
            @endforeach
        </li>
        <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
            {{ auth()->user()->name }} &nbsp;
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-fluid" src="{{ url('assets_dashboard/img/illustrations/profiles/profile-2.png') }}" />
            </a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ url('assets_dashboard/img/illustrations/profiles/profile-2.png') }}" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name }}</div>
                        <div class="dropdown-user-details-email">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#!">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        @include('@dashboard._layouts.sidebar')
    </div>

    <div id="layoutSidenav_content">
        <main>
            <!-- Alert -->
            <div class="float-alert">
                @if(session()->has('message'))
                    <div class="alert alert-{{ session('message')['type'] }} alert-dismissible fade show" role="alert">
                        {{ session('message')['text'] }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            @yield('page_contents')
        </main>


        <footer class="footer mt-auto footer-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 small">Copyright &#xA9; Cayshly 2021</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="#!">Privacy Policy</a>
                        &#xB7;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('@dashboard._modals.confirm_delete')
@yield('modals')

<script src="{{ url('assets_dashboard/vendor/jquery/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('assets_dashboard/vendor/bootstrap_4.5.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
{{--<script src="{{ url('assets_dashboard/vendor/Chart.js/2.9.4/Chart.min.js') }}" crossorigin="anonymous"></script>--}}
{{--<script src="{{ url('assets_dashboard/vendor/chart-area-demo.js') }}"></script>--}}
{{--<script src="{{ url('assets_dashboard/vendor/chart-bar-demo.js') }}"></script>--}}
<script src="{{ url('assets_dashboard/vendor/datatables/1.10.22/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('assets_dashboard/vendor/datatables/1.10.22/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('assets_dashboard/vendor/datatables-demo.js') }}"></script>
<script src="{{ url('assets_dashboard/vendor/momentjs/latest/moment.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('assets_dashboard/vendor/daterangepicker/daterangepicker.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('assets_dashboard/vendor/date-range-picker-demo.js') }}"></script>
<script src="{{ url('assets_dashboard/js/alerts.js') }}"></script>
<script src="{{ url('assets_dashboard/js/loader.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{--<script src="{{ url('assets_dashboard/js/sb-customizer.js') }}"></script>--}}
<script src="{{ url('assets_dashboard/js/scripts.js') }}"></script>

{{--<sb-customizer project="sb-admin-pro"></sb-customizer>--}}

@yield('footer_scripts')

</body>
</html>
