@extends('front.common.layout')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            @if (isset($getcontent))
            <h2>{{ $getcontent->home_title }}</h2>
            <p>{{ $getcontent->home_description }}</p>
            @endif

          <a href="{{ route('contactpage.index') }}" class="btn-get-started">Available for hire</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


@section('content')
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
                <a href="{{ route('gellary.single',Crypt::encrypt($v->id)) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Gallery Item -->

        @endforeach
        @endif

      </div>

    </div>
  </section><!-- End Gallery Section -->
@endsection
