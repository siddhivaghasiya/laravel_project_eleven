<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('admin-asset/assets/images/logo.svg') }}"
                alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
                src="{{ asset('admin-asset/assets/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('admin-asset/assets/images/faces/face1.jpg') }}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2">Henry Klein</span>
                    <span class="font-weight-normal">$8,753.00</span>
                </div>
                <span class="badge badge-danger text-white ml-3 rounded">3</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Common Modules</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <a class="" href="{{ route('about.index') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <i class="mdi mdi-image"></i>
                        <a class="" href="{{ route('gellary.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <i class="mdi mdi-account-multiple"></i>
                        <a class="" href="{{ route('testimonial.index') }}">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <i class="mdi mdi-information"></i>
                        <a class="" href="{{ route('service.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <i class="mdi mdi-contact-mail"></i>
                        <a class="" href="{{ route('contact.index') }}">ContactUS</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('content.index') }}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Content Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">Admin Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">General Setting</span>
            </a>
        </li>


        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <ul class="mt-4 pl-0">
                        <li>Sign Out</li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>
