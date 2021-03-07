@extends('@public._layouts.master')

@section('page_title') {{ trans('address.address') }} @endsection

@section('page_contents')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="address-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('public.home') }}"><i class="czi-home"></i>{{ trans('master.Home') }}</a></li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ trans('address.address') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="address-lg-1 pr-lg-4 text-center text-lg-left">
                <h1 class="h3 text-light mb-0">{{ trans('address.My_address') }}</h1>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
        <div class="row rtl-ar">
            <!-- Sidebar-->
            @include('@public.user._partials.sidebar', ['page' => 'address'])

            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="font-size-base text-light mb-0">{{ trans('wishlist.List_of_your_addresss') }}:</h6>
                    @include('@public._partials.logout_btn')
                </div>

                <!-- addresss list-->
                <div class="card card-body">
                    <div class="table-responsive font-size-md">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>{{ trans('address.address') }}</th>
{{--                                <th style="width: 20%;">{{ trans('address.Actions') }}</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->addresses as $address)
                                <tr>
                                    <td class="py-3 align-middle">{{ $address->address }} <span class="align-middle badge badge-info ml-2">Primary</span></td>
{{--                                    <td style="width: 20%;" class="py-3 align-middle">--}}
{{--                                        <a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">--}}
{{--                                            <div class="czi-trash"></div>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <hr class="pb-4">--}}
{{--                    <div class="text-sm-right">--}}
{{--                        <a class="btn btn-primary" href="#add-address" data-toggle="modal">Add new address</a>--}}
{{--                    </div>--}}
                </div>

            </section>
        </div>
    </div>

@endsection
