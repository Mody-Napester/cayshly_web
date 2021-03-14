<!-- Slider-->
<section class="cz-carousel mb-4 mb-sm-5 rtl-ar">
    <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;: {&quot;nav&quot;: true, &quot;controls&quot;: false}, &quot;576&quot;: {&quot;nav&quot;: false, &quot;controls&quot;: true}}}">
        @foreach($sliders as $slider)
        <div>
            <div class="px-md-5 text-center text-xl-left pt-3 pb-3 bg-secondary">
                <div class="d-xl-flex justify-content-between align-items-center px-4 px-sm-5 mx-auto" style="max-width: 1226px;">
                    <div class="py-5 rtl-mrl-3 mx-auto mx-xl-0" style="max-width: 490px;">
                        <h2 class="h1 from-left delay-1 rtl-ar">{{ getFromJson($slider->text_1 , lang()) }}</h2>
                        <p class="pb-4 from-left delay-2 rtl-ar">{{ getFromJson($slider->text_2 , lang()) }}</p>
                        <h5 class="pb-3 from-left delay-3 rtl-ar">{{ getFromJson($slider->text_3 , lang()) }}</h5>
                        <div class="d-flex flex-wrap justify-content-center justify-content-xl-start">
                            <a class="btn btn-primary btn-shadow scale-up delay-4 fire-loader-anchor" href="{{ $slider->button_1_link }}">{{ getFromJson($slider->button_1_text , lang()) }}<i class="czi-arrow-right ml-2 mr-n1"></i></a>
                        </div>
                    </div>
                    <div class="px-3"><img src="{{ url('assets_public/images/slider/'. $slider->image) }}" alt="{{ getFromJson($slider->text_1 , lang()) }}"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{--<section class="bg-secondary">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <!-- Slider -->--}}
{{--            <div class="col-xl-12 pt-xl-4 order-xl-2">--}}
{{--                <div class="cz-carousel">--}}
{{--                    <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;loop&quot;: false}">--}}
{{--                        @foreach($sliders as $slider)--}}
{{--                            <div>--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-md-8 order-md-2">--}}
{{--                                        <img class="d-block mx-auto" src="{{ url('assets_public/images/slider/'. $slider->image) }}" alt="{{ getFromJson($slider->text_1 , lang()) }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 order-md-1 pt-4 pb-md-4 text-center text-md-left">--}}
{{--                                        <h2 class="font-weight-light pb-1 from-left">{{ getFromJson($slider->text_1 , lang()) }}</h2>--}}
{{--                                        <h1 class="display-4 from-left delay-1">{{ getFromJson($slider->text_2 , lang()) }}</h1>--}}
{{--                                        <h5 class="font-weight-light pb-3 from-left delay-2">{{ getFromJson($slider->text_3 , lang()) }}</h5>--}}
{{--                                        <a class="btn btn-primary btn-shadow scale-up delay-4 fire-loader-anchor" href="{{ $slider->button_1_link }}">{{ getFromJson($slider->button_1_text , lang()) }}<i class="czi-arrow-right ml-2 mr-n1"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Banner group-->--}}
{{--            <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0">--}}
{{--                <div class="table-responsive" data-simplebar>--}}
{{--                    <div class="d-flex d-xl-block">--}}
{{--                        @foreach($featured_sliders as $key => $featured_slider)--}}
{{--                        <a class="media w-100 align-items-center bg-faded-{{ ($key == 0)? 'info' : 'warning' }} rounded-lg pt-2 pl-2 mb-4 mr-4 mr-xl-0 fire-loader-anchor" href="{{ $featured_slider->button_1_link }}" style="min-width: 16rem;">--}}
{{--                            <img src="{{ url('assets_public/images/slider/'. $featured_slider->image) }}" width="125" alt="Banner">--}}
{{--                            <div class="media-body py-4 px-2">--}}
{{--                                <h5 class="mb-2">--}}
{{--                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_1 , lang()) }}</span>--}}
{{--                                    <br>--}}
{{--                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_2 , lang()) }}</span>--}}
{{--                                    <br>--}}
{{--                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_3 , lang()) }}</span>--}}
{{--                                </h5>--}}
{{--                                <div class="text-info font-size-sm">{{ getFromJson($featured_slider->button_1_text , lang()) }}<i class="czi-arrow-right font-size-xs ml-1"></i></div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
