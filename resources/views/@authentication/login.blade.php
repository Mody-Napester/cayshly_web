@extends('@public._layouts.master')

@section('page_title') {{ trans('login.login') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-dark pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('login.login') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-sign-in"></i> {{ trans('login.login') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card border-0 box-shadow">
                    <div class="card-body">
                        <h2 class="h4 mb-1">{{ trans('login.Sign_in') }}</h2>
{{--                        <div class="py-3">--}}
{{--                            <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">With social account:</h3>--}}
{{--                            <div class="d-inline-block align-middle">--}}
{{--                                <a class="social-btn sb-google mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Google"><i class="czi-google"></i></a>--}}
{{--                                <a class="social-btn sb-facebook mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Facebook"><i class="czi-facebook"></i></a>--}}
{{--                                <a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Twitter"><i class="czi-twitter"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <hr class="mt-3 mb-3">
{{--                        <h3 class="font-size-base pt-4 pb-2">Or using form below</h3>--}}
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-mail"></i></span></div>
                                <input class="form-control @error('email') is-invalid @enderror prepended-form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="{{ trans('login.Email') }}" required autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                                <div class="password-toggle">
                                    <input class="form-control @error('password') is-invalid @enderror prepended-form-control" id="password" name="password" type="password" placeholder="{{ trans('login.Password') }}" required autocomplete="current-password">
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ trans('login.Show_password') }}</span>
                                    </label>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="d-flex flex-wrap justify-content-between">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input class="custom-control-input" type="checkbox" checked id="remember_me">--}}
{{--                                    <label class="custom-control-label" for="remember_me">Remember me</label>--}}
{{--                                </div>--}}
{{--                                <a class="nav-link-inline font-size-sm" href="account-password-recovery.html">Forgot password?</a>--}}
{{--                            </div>--}}
                            <div class="text-center">
                                <p>{{ trans('login.dont_have_account') }} .. <a class="nav-link-inline font-size-sm" href="{{ route('register') }}">{{ trans('login.create') }}</a></p>
                            </div>
                            <hr class="mt-4">
                            <div class="text-right pt-4">
                                <button class="btn btn-primary" type="submit"><i class="czi-sign-in mr-2 ml-n21"></i>{{ trans('login.Sign_in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
