@extends('@public._layouts.master')

@section('page_title') Server Error @endsection

@section('page_contents')

    <div class="container py-5 mb-lg-3">
        <div class="row justify-content-center pt-lg-4 text-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <img class="d-block mx-auto mb-5" src="{{ url('assets_public/img/pages/404.png') }}" width="340" alt="500 Error">
                <h1 class="h3">500 error</h1>
                <h3 class="h5 font-weight-normal mb-4">Server Error.. This page can't be rendered.</h3>
            </div>
        </div>
    </div>

@endsection
