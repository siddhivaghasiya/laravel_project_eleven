@extends('front.common.layout')

@section('content')
    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">

                        @if (isset($getcontent))
                            <h2>{{ $getcontent->gellary_single_title }}</h2>
                            <p>{{ $getcontent->gellary_single_description }}</p>
                        @endif

                        <a class="cta-btn" href="{{ route('contactpage.index') }}">Available for hire</a>

                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Gallery Single Section ======= -->
        <section id="gallery-single" class="gallery-single">
            <div class="container">

                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            @if (isset($getgellary))
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/gellary/' . $getgellary->image) }}" alt="">
                                </div>
                            @endif



                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            @if (isset($getgellary))

                            <p>
                                {{ $getgellary->description_one }}
                            </p>

                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    {{ $getgellary->description_two }}

                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <div>
                                    <img src="{{ asset('uploads/gellary/'.$getgellary->image_employee) }}" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $getgellary->name }} </h3>
                                    <h4> {{ $getgellary->position }}  </h4>
                                </div>
                            </div>

                            <p>
                                {{ $getgellary->description_three }}
                            </p>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong> <span>Nature Photography</span></li>
                                <li><strong>Client</strong> <span>ASU Company</span></li>
                                <li><strong>Project date</strong> <span>01 March, 2022</span></li>
                                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
                                <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Single Section -->

    </main><!-- End #main -->
@endsection
