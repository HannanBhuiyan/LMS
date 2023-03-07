 <!-- footer section start here -->
<section class="footer__section section__gap">
    <div class="container">
        <div class="footer__inner">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="footerBox mb-4 mb-lg-0">
                        <h2>Company</h2> 
                        <div class="footer__list">
                            <ul>
                                <li>
                                    <p class="mb-2"><strong>Farjax tech & consulting Inc.</strong> </p>
                                    <p class="mb-2"> <strong>Office:</strong> +1 (718)785-4636</p>
                                     <strong>Email: </strong><a href="mailto:info@farjaxtci.com">info@farjaxtci.com</a>
                                    <p class="mt-2">
                                        <strong>Address:</strong> 3612 28th street, Astoria, Queens
                                         Zip code- 1106, New York , USA 
                                    </p>
                                </li>
                  
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footerBox mb-4 mb-lg-0">
                        <h2 class="follow_us_title">Follow Us</h2> 
                        <div class="social"> 
                            <ul class=" d-flex justify-content-between flex-wrap">
                                @if (social_links_count() > 0)
                                    <li><a href="{{ social_links()->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{ social_links()->twitter }}"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li class="m-0"><a href="{{ social_links()->youtube }}"><i class="fa-brands fa-youtube"></i></a></li>
                                    <li class=""><a href="{{ social_links()->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li class=""><a href="{{ social_links()->instragram }}"><i class="fa-brands fa-instagram"></i></a></li>
                                    <a href="{{ social_links()->telegram }}"><img src="{{ asset('frontend/assets/image/icon/telegram.png') }}" alt="icon"></a>
                                @endif
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footerBox mb-4 mb-lg-0">
                        <h2 class="follow_us_title">Get Us </h2>
                        <div class="footer__list footer__course_list">
                            <ul>
                                <li><a href="#!">About Us</a></li>
                                <li><a href="#!">Careers</a></li> 
                                <li><a href="#!">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footerBox mb-4 mb-lg-0">
                        <h2>Courses</h2>
                        <div class="footer__list">
                            <ul>
                                @forelse (getFiveCourse() as $course)
                                    <li><a href="{{ route('home.course', $course->slug) }}">{{ $course->course_name }}</a></li>
                                @empty
                                    <span class="text-danger">Course not found</span>
                                @endforelse 
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- footer section start end -->


