@extends('layouts.frontend.home_master')
@section('title','Home')
@section('content')
    <section class="hero__section" style="background-image: url('{{ asset($banner->banner_image) }}">
        <div class="container">
            <div class="banner__section">
                <div class="banner__content">
                    <h1>{{$banner->title_one ?? ''}} <span>{{$banner->title_two ?? ''}}</span></h1>
                    <p>{{$banner->description ?? ''}}</p>
                    {{-- <button class="applyBtn">Apply Now</button> --}}
                    <a href="#contact" class="applybutton applyBtn">Apply Now</a>
                </div>
            </div>

        </div>

    </section>
 
    <!-- bootcamp section start here -->
    <section class="bootcamp__section section__gap" id="service">
        <div class="container">
            <div class="bootcamp__inner">
                <div class="service__title text-center">
                    <h3 class="mb-3">Our Computer Science Courses</h3>
                    <p> Our Computer Science Courses are designed to equip students with the knowledge and skills required to excel in the dynamic field of technology. 
                    Our courses cover a wide range of topics including programming languages, algorithms, data structures, software engineering, artificial intelligence, and more.</p>
                </div>
            <div class="bootcamp__inner">
                <div class="row"> 
                    @forelse ($courses as $course)
                    <div class="col-sm-6 col-md-4">
                        <a href="{{ route('home.course', ['id'=>$course->id, 'slug'=>$course->slug]) }}">
                            <div class="bootcamp mx-auto" style="background-image: url('{{ asset($course->thumbnail) }}');">
                                <div class="bootContent">
                                    <h4>{{ $course->course_name}}</h4>
                                    <p><i class="fa-regular fa-calendar"></i> <span>{{ $course->course_duration }}</span></p>
                                    <p><i class="fa-regular fa-clock"></i> <span>Course Starts : {{  \Carbon\Carbon::parse($course->start_date)->format("j M, Y") }}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                        <center>
                            <h2>Course not found</h2>
                        </center>
                    @endforelse 
                </div>
            </div>
        </div>
    </section>
    <!-- bootcamp section end here -->


    <!-- contact section start here -->
    <section class="service__section section__gap" id="contact">
        <div class="container">
            <div class="service__inner">
                <div class="service__title text-center">
                    <h4>Request For Services</h4>
                    <p>To request more information about our online computer science related training, please
                        fill out the form below. One of our representatives will contact you shortly.</p>
                </div>
                <div class="service__form">
                    <form action="{{ route('contact') }}" method="post">
                        @csrf
                        <div class="formInput">
                            <input type="text" name="name" placeholder="Name*" required>

                            <input type="email" name="email"  placeholder="Email*" required>
                        </div>
                        <div class="formInput">
                            <input type="tel" id="phone" name="phone" >
                        </div>
                        <div>
                            <textarea placeholder="Message*" name="message" id=""  rows="1" style="width: 100%;" required></textarea>
                        </div>
                        {{-- <div class="form-check d-flex align-items-center">
                            <input type="checkbox" class="form-check-input mb-0 me-2" id="check2" name="option2" value="something" style="width: unset; border: 1px solid #d5d5d5;
                            padding: 10px; cursor: pointer;">
                            <label class="form-check-label" for="check2" style=" color: #33334d; user-select: none; cursor: pointer;">Opt in marketing communication Privacy Statement</label>
                        </div> --}}
                        <button class="applyBtn mt-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section start here -->
@endsection
