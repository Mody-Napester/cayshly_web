@extends('@public._layouts.master')

@section('page_title') {{ trans('forgot_password.forgot_password') }} @endsection

@section('page_contents')

    <!-- Page title-->
    <div class="page-title-overlap bg-dark pt-4 pb-4">
        <div class="container pt-lg-3 pb-lg-4">
            <div class="d-lg-flex pb-5 mb-3 justify-content-between">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('forgot_password.forgot_password') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 text-light mb-0"><i style="margin-right: 5px;" class="czi-sign-in"></i> {{ trans('forgot_password.forgot_password') }}</h1>
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
                        <h2 class="h4 mb-1">{{ trans('forgot_password.Enter_your_email_address') }}</h2>
                        <hr class="mt-3 mb-3">

                        <h2 class="h3 mb-4">{{ trans('forgot_password.Forgot_your_password') }}</h2>
                        <p class="font-size-md">{{ trans('forgot_password.Change_your_password_in_three_easy_steps') }}</p>
                        <ol class="list-unstyled font-size-md">
                            <li><span class="text-primary mr-2">1.</span>{{ trans('forgot_password.Fill_in_your_email_address_below') }}</li>
                            <li><span class="text-primary mr-2">2.</span>{{ trans('forgot_password.We_will_email_you_a_temporary_code') }}</li>
                            <li><span class="text-primary mr-2">3.</span>{{ trans('forgot_password.Use_the_code_to_change_your_password_on_our_secure_website') }}</li>
                        </ol>

                        <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="input-group-overlay form-group">
                                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-mail"></i></span></div>
                                <input class="form-control @error('email') is-invalid @enderror prepended-form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="{{ trans('forgot_password.Email') }}" required autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr class="mt-4">
                            <div class="text-right pt-4">
                                <button class="btn btn-primary" type="submit"><i class="czi-sign-in mr-2 ml-n21"></i>{{ trans('forgot_password.Email_Password_Reset_Link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
