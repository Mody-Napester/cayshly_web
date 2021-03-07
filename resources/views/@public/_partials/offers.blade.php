<!-- Heading-->
<div class="pt-1 border-bottom pb-4 mb-4 text-center ">
    <h2 class="h3 mb-0 pt-3 mr-2 text-center">{{ trans('partials.Best_Offers') }}</h2>
</div>

@foreach($offers as $offer)
    <section class="container mt-4 mb-grid-gutter">
        <div class="row rtl-ar">
            @include('@public._partials.offer')
        </div>
    </section>
@endforeach
