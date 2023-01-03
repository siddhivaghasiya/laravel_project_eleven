@include('front.common.header')

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->

                <!-- <img src="assets/img/logo.png" alt=""> -->
                <?php
                $getsetting = \App\Models\Setting::first();
                ?>

                @if (isset($getsetting))
                    <i class="{{ $getsetting->icon }}"></i>

                    <h1>{{ $getsetting->logo }}</h1>
                @endif

            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('aboutpage.index') }}">About</a></li>
                    <li><a href="{{ route('gellarypage.index') }}">Gallery</a></li>
                    <li><a href="{{ route('servicepage.index') }}">Services</a></li>
                    <li><a href="{{ route('contactpage.index') }}">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <?php
            $getdata = \App\Models\Socialmedia::where('status', 1)->get();
            ?>

            <div class="header-social-links">
                @if (isset($getdata) && !$getdata->isEmpty())

                    @foreach ($getdata as $key => $v)
                        <a href="{{ $v->link }}" target="_blank" class="{{ $v->title }}"><i
                                class="{{ $v->icon }}"></i></a>
                    @endforeach

                @endif
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->


    <main id="main" data-aos="fade" data-aos-delay="1500">

        <!-- ======= Gallery Section ======= -->
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('front.common.footer')
