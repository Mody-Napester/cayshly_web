@extends('@public._layouts.master')

@section('page_title') {{ trans('register.register') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-dark pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('register.register') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-sign-in"></i> {{ trans('register.register') }}</h1>
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
                        <h2 class="h4 mb-1">{{ trans('register.Create_new_account') }}</h2>
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
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-edit"></i></span></div>
                                <input class="form-control prepended-form-control" @error('name') is-invalid @enderror id="name" name="name" type="text" value="{{ old('name') }}" placeholder="{{ trans('register.Name') }}" required autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-mail"></i></span></div>
                                <input class="form-control prepended-form-control" @error('email') is-invalid @enderror id="email" name="email" type="email" value="{{ old('email') }}" placeholder="{{ trans('register.Email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-phone"></i></span></div>
                                <input class="form-control prepended-form-control" @error('phone') is-invalid @enderror id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="{{ trans('register.Phone') }}" required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-time"></i></span></div>
                                <input class="form-control prepended-form-control" @error('dob') is-invalid @enderror id="dob" name="dob" type="date" value="{{ old('dob') }}" placeholder="{{ trans('register.dob') }}" required>
                                @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-user-circle"></i></span></div>
                                <select class="form-control prepended-form-control" @error('gender') is-invalid @enderror id="gender" name="gender">
                                    <option value="1">{{ trans('register.male') }}</option>
                                    <option value="2">{{ trans('register.female') }}</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                                <div class="password-toggle">
                                    <input class="form-control prepended-form-control" @error('password') is-invalid @enderror id="password" name="password" type="password" placeholder="{{ trans('register.Password') }}" required autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ trans('register.Show_password') }}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                                <div class="password-toggle">
                                    <input class="form-control prepended-form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="{{ trans('register.Confirm_Password') }}" required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ trans('register.Show_password') }}</span>
                                    </label>
                                </div>
                            </div>

                            <hr class="mt-4">
                            <div class="text-right pt-4">
                                <button class="btn btn-primary" type="submit"><i class="czi-add-user mr-2 ml-n21"></i>{{ trans('register.Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
