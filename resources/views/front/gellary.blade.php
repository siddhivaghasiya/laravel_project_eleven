@extends('front.common.layout')

@section('content')

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            @if (isset($getcontent))
            <h2>{{ $getcontent->gellary_title }}</h2>
            <p>{{ $getcontent->gellary_description }}</p>
            @endif

          <a href="{{ route('contactpage.index') }}" class="cta-btn">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="row gy-4 justify-content-center">

            @if (isset($getgellary) && !$getgellary->isEmpty())

            @foreach ($getgellary as $key=>$v )

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="gallery-item h-100">
                  <img src="{{ asset('uploads/gellary/'.$v->image) }}" class="img-fluid" alt="">
                  <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('uploads/gellary/'.$v->image) }}" title="Gallery 1" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="{{ route('gellary.single',$v->slug) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div><!-- End Gallery Item -->

            @endforeach
            @endif



        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main>

@endsection
