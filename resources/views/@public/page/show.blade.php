@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($page->name , lang()) }} @endsection

@section('page_contents')

    <!-- Hero section with search-->
    <section class="bg-dark bg-size-cover bg-position-center-x position-relative py-5 mb-3" style="background-image: url({{ url('assets_public/images/page/cover/'. $page->cover) }});"><span class="bg-overlay bg-darker" style="opacity: .65;"></span>
        <div class="bg-overlay-content container py-4 my-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-light text-center">{{ getFromJson($page->name , lang()) }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-3">
        {!! getFromJson($page->details , lang()) !!}
    </section>

@endsection
