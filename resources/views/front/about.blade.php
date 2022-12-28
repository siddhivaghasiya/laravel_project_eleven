@extends('front.common.layout')

@section('content')
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    @if (isset($getcontent))
                        <h2>{{ $getcontent->about_title }}</h2>
                        <p>{{ $getcontent->about_description }}</p>
                    @endif

                    <a href="{{ route('contactpage.index') }}" class="cta-btn">Available for hire</a>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    @if (isset($getdata))
                        <img src="{{ asset('uploads/aboutus/' . $getdata->image) }}" class="img-fluid" alt="">
                    @endif

                </div>
                <div class="col-lg-5 content">
                    @if (isset($getdata))
                        <h2>{{ $getdata->title }}</h2>
                        <p class="fst-italic py-3">
                            {{ $getdata->short_description }}
                        </p>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                    <span>www.example.com</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong>
                                    <span>email@example.com</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @if (isset($getdata))
                        <p class="py-3">
                            {{ $getdata->long_description }}
                        </p>
                    @endif

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

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
@endsection
