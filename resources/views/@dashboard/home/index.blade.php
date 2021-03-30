@extends('@dashboard._layouts.master')

@section('page_title') {{ trans('home.Home') }} @endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Dashboard
                        </h1>
                        <div class="page-header-subtitle">Overview and content summary</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
{{--                        <button class="btn btn-white p-3" id="reportrange">--}}
{{--                            <i class="mr-2 text-primary" data-feather="calendar"></i>--}}
{{--                            <span></span>--}}
{{--                            <i class="ml-1" data-feather="chevron-down"></i>--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
{{--        <div class="row">--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <!-- Dashboard info widget 1-->--}}
{{--                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="flex-grow-1">--}}
{{--                                <div class="small font-weight-bold text-primary mb-1">Earnings (monthly)</div>--}}
{{--                                <div class="h5">$4,390</div>--}}
{{--                                <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">--}}
{{--                                    <i class="mr-1" data-feather="trending-up"></i>--}}
{{--                                    12%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ml-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <!-- Dashboard info widget 2-->--}}
{{--                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="flex-grow-1">--}}
{{--                                <div class="small font-weight-bold text-secondary mb-1">Average sale price</div>--}}
{{--                                <div class="h5">$27.00</div>--}}
{{--                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">--}}
{{--                                    <i class="mr-1" data-feather="trending-down"></i>--}}
{{--                                    3%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ml-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <!-- Dashboard info widget 3-->--}}
{{--                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="flex-grow-1">--}}
{{--                                <div class="small font-weight-bold text-success mb-1">Clicks</div>--}}
{{--                                <div class="h5">11,291</div>--}}
{{--                                <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">--}}
{{--                                    <i class="mr-1" data-feather="trending-up"></i>--}}
{{--                                    12%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ml-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                <!-- Dashboard info widget 4-->--}}
{{--                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="flex-grow-1">--}}
{{--                                <div class="small font-weight-bold text-info mb-1">Conversion rate</div>--}}
{{--                                <div class="h5">1.23%</div>--}}
{{--                                <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">--}}
{{--                                    <i class="mr-1" data-feather="trending-down"></i>--}}
{{--                                    1%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ml-2"><i class="fas fa-percentage fa-2x text-gray-200"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Users</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\User::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Categories</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Category::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Brands</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Brand::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Stores</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Store::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Requests</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-accent text-black mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-black-75 small">Products</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Product::count() }}</div>
                            </div>
                            <i class="feather-xl text-black-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="#">View</a>
                        <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-purple text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Orders</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Order::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Blogs</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Blog::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-pink text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Subscribers</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Subscriber::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-cyan text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Scripts</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Script::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-orange text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Offers</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Offer::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Slider</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Slider::count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3">
                <div class="card bg-accent text-black mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-black-75 small">Social Accounts</div>
                                <div class="text-lg font-weight-bold">{{ \App\Models\Social::count() }}</div>
                            </div>
                            <i class="feather-xl text-black-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="#">View</a>
                        <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
{{--            <div class="col-xxl-3 col-lg-3">--}}
{{--                <div class="card bg-primary border-0">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="text-white-50">Budget Overview</h5>--}}
{{--                        <div class="mb-4">--}}
{{--                            <span class="display-4 text-white">$48k</span>--}}
{{--                            <span class="text-white-50">per year</span>--}}
{{--                        </div>--}}
{{--                        <div class="progress bg-white-25 rounded-pill" style="height: 0.5rem"><div class="progress-bar bg-white w-75 rounded-pill" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

@endsection
