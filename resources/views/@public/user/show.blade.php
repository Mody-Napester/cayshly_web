@extends('@public._layouts.master')

@section('page_title') {{ $user->name }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('users.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('users.Profile_info') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{ trans('users.Profile_info') }}</h1>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row">
            <!-- Sidebar-->
            @include('@public.user._partials.sidebar')

            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">{{ trans('users.Update_you_profile_details_below') }}:</h6>
                    @include('@public._partials.logout_btn')
                </div>
                <!-- Profile form-->
                <div class="card card-body">
                    <form>
                        <div class="bg-secondary rounded-lg p-4 mb-4">
                            <div class="media align-items-center">
                                <img src="{{ url('assets_public/img/shop/account/avatar.jpg') }}" width="90" alt="{{ $user->name }}">
                                <div class="media-body pl-3">
                                    <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i class="czi-loading mr-2"></i>{{ trans('users.Change_avatar') }}</button>
                                    <div class="p mb-0 font-size-ms text-muted">{{ trans('users.Upload') }} JPG, GIF or PNG.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="account-fn">{{ trans('users.Full_Name') }}</label>
                                    <input class="form-control" type="text" id="account-fn" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-fn">{{ trans('users.First_Name') }}</label>
                                    <input class="form-control" type="text" id="account-fn" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-ln">{{ trans('users.Last_Name') }}</label>
                                    <input class="form-control" type="text" id="account-ln" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-email">{{ trans('users.Email_Address') }}</label>
                                    <input class="form-control" type="email" id="account-email" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-phone">{{ trans('users.Phone_Number') }}</label>
                                    <input class="form-control" type="text" id="account-phone" value="{{ $user->phone }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-pass">{{ trans('users.New_Password') }}</label>
                                    <div class="password-toggle">
                                        <input class="form-control" type="password" id="account-pass">
                                        <label class="password-toggle-btn">
                                            <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ trans('users.Show_password') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="account-confirm-pass">{{ trans('users.Confirm_Password') }}</label>
                                    <div class="password-toggle">
                                        <input class="form-control" type="password" id="account-confirm-pass">
                                        <label class="password-toggle-btn">
                                            <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">{{ trans('users.Show_password') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-2 mb-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox d-block">
                                        <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
                                        <label class="custom-control-label" for="subscribe_me">{{ trans('users.Subscribe_me_to_Newsletter') }}</label>
                                    </div>
                                    <button class="btn btn-primary mt-3 mt-sm-0" type="button">{{ trans('users.Update_profile') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

@endsection