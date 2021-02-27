<section class="bg-secondary py-4 pt-md-5">
    <div class="container py-xl-2">
        <div class="row">
            <!-- Slider     -->
            <div class="col-xl-9 pt-xl-4 order-xl-2">
                <div class="cz-carousel">
                    <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;controls&quot;: false, &quot;loop&quot;: false}">
                        @foreach($sliders as $slider)
                            <div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 order-md-2"><img class="d-block mx-auto" src="{{ url('assets_public/images/slider/'. $slider->image) }}" alt="{{ getFromJson($slider->text_1 , lang()) }}"></div>
                                    <div class="col-lg-5 col-md-6 offset-lg-1 order-md-1 pt-4 pb-md-4 text-center text-md-left">
                                        <h2 class="font-weight-light pb-1 from-left">{{ getFromJson($slider->text_1 , lang()) }}</h2>
                                        <h1 class="display-4 from-left delay-1">{{ getFromJson($slider->text_2 , lang()) }}</h1>
                                        <h5 class="font-weight-light pb-3 from-left delay-2">{{ getFromJson($slider->text_3 , lang()) }}</h5>
                                        <a class="btn btn-primary btn-shadow scale-up delay-4" href="{{ $slider->button_1_link }}">{{ getFromJson($slider->button_1_text , lang()) }}<i class="czi-arrow-right ml-2 mr-n1"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Banner group-->
            <div class="col-xl-3 order-xl-1 pt-4 mt-3 mt-xl-0 pt-xl-0">
                <div class="table-responsive" data-simplebar>
                    <div class="d-flex d-xl-block">
                        @foreach($featured_sliders as $key => $featured_slider)
                        <a class="media w-100 align-items-center bg-faded-{{ ($key == 0)? 'info' : 'warning' }} rounded-lg pt-2 pl-2 mb-4 mr-4 mr-xl-0" href="{{ $featured_slider->button_1_link }}" style="min-width: 16rem;">
                            <img src="{{ url('assets_public/images/slider/'. $featured_slider->image) }}" width="125" alt="Banner">
                            <div class="media-body py-4 px-2">
                                <h5 class="mb-2">
                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_1 , lang()) }}</span>
                                    <br>
                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_2 , lang()) }}</span>
                                    <br>
                                    <span class="font-weight-light">{{ getFromJson($featured_slider->text_3 , lang()) }}</span>
                                </h5>
                                <div class="text-info font-size-sm">{{ getFromJson($featured_slider->button_1_text , lang()) }}<i class="czi-arrow-right font-size-xs ml-1"></i></div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
