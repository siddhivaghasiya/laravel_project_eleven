@extends('admin.layout')
@section('content')
    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-contacts menu-icon"></i> <a href="{{ route('about.index') }}" class="ab">ABOUT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-image"></i>  <a href="{{ route('gellary.index') }}" class="ab">GELLARY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-account-multiple"></i>
                        <a href="{{ route('testimonial.index') }}" class="ab">TESTIMONIAL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-information"></i>
                        <a href="{{ route('service.index') }}" class="ab">SERVICES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-contact-mail"></i>
                        <a href="{{ route('contact.index') }}" class="ab">CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <a href="{{ route('content.index') }}" class="ab">CONTENT MANAGEMENT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-signal-variant menu-icon"></i>
                        <a href="{{ route('socialmedia.index') }}" class="ab">SOCIAL MEDIA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-settings menu-icon"></i>
                        <a href="{{ route('setting.index') }}" class="ab">GENERAL SETING</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
