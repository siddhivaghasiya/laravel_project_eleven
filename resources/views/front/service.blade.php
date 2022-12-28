@extends('front.common.layout')

@section('content')

    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        @if (isset($getcontent))
                            <h2>{{ $getcontent->service_title }}</h2>
                            <p>{{ $getcontent->service_description }}</p>
                        @endif

                        <a href="{{ route('contactpage.index') }}" class="cta-btn">Available for hire</a>

                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="row gy-4">

                    @if (isset($getservice) && !$getservice->isEmpty())
                        @foreach ($getservice as $key => $v)
                            <div class="col-xl-3 col-md-6 d-flex">
                                <div class="service-item position-relative">
                                    <i class="{{ $v->icon }}"></i>
                                    <h4><a href="" class="stretched-link">{{ $v->title }}</a></h4>
                                    <p>{{ $v->description }}</p>
                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    @endif


                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-header">
                    <h2>Prices</h2>
                    <p>Check my adorable pricing</p>
                </div>

                <div class="row gy-4 gx-lg-5">

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Portrait Photography</h3>
                            <h4>$160.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Fashion Photography</h3>
                            <h4>$300.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Sports Photography</h3>
                            <h4>$200.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Still Life Photography</h3>
                            <h4>$120.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Wedding Photography</h3>
                            <h4>$500.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-6">
                        <div class="pricing-item d-flex justify-content-between">
                            <h3>Photojournalism</h3>
                            <h4>$200.00</h4>
                        </div>
                    </div><!-- End Pricing Item -->

                </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-header">
                    @if (isset($getcontent))
                        <h2>{{ $getcontent->testimonial_title }}</h2>
                        <p>{{ $getcontent->testimonial_description }}</p>
                    @endif
                </div>

                <div class="slides-3 swiper">
                    <div class="swiper-wrapper">
                        @if (isset($gettestimonialdata) && !$gettestimonialdata->isEmpty())
                            @foreach ($gettestimonialdata as $key => $v)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            {{ $v->description }}
                                        </p>
                                        <div class="profile mt-auto">
                                            <img src="{{ asset('uploads/testimonial/' . $v->image) }}" class="testimonial-img"
                                                alt="">
                                            <h3> {{ $v->name }}</h3>
                                            <h4> {{ $v->position }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- End testimonial item -->


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->
    </main>


@endsection
