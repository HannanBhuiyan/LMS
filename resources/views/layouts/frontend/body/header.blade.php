<!-- hero section start here -->
{{-- Navbar --}}

<div class="navbar_section">
    <div class="container">
        <div class="heading d-flex justify-content-between align-items-center">
            <div class="logo">
               @if (logoCount() > 0)
                <a href="{{ route('home') }}"><img src="{{ asset(getsitelogo()->site_logo) }}" alt="logo"></a>
               @endif
            </div>
            <div class="menu d-none d-lg-block">
                <ul class=" d-flex align-items-center">
                    <li><a href="#service">Course </a></li>
                    <li><a href="#service">Service</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a class="login" href="{{ route('login') }}">Log In</a></li>
                </ul>
            </div>
            <div class="menubar d-block d-lg-none">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
</div>


<!-- hero section start here -->

 <!-- mobile__menu -->
 <section class="mobile__menu ">
    <div class="d-flex justify-content-between"><img src="{{ asset('frontend/assets/image/logo/logo.png') }}" alt="logo"> <span class="crossMark"><i class="fa-solid fa-xmark"></i></span></div>
    <ul>
        <li><a href="#">Course</a></li>
        <li><a href="#">Service</a></li>
        <li><a href="#">Contact</a></li>
        <li class=""><a href="#">Log in</a></li>
    </ul>
</section>
<!-- mobile__menu -->
