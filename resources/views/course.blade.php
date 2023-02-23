@extends('layouts.frontend.home_master')
@section('title','Courses')
@section('content')

<!-- landing banner section start here -->
    <section class="landing__banner" style="padding: 200px 0 80px">
        <div class="container">
            <div class="landing__inner">
                <div class="row gx-4 gx-md-5">
                    <div class="col-md-5">
                        <img width="100%" src="{{ asset('frontend/assets/image/section/banner2.png') }}" alt="image">
                    </div>
                    <div class="col-md-7">
                        <div class="landing__content">
                            <div class="title">
                                {{-- <img src="{{ asset('frontend/assets/image//logo/logo.png') }}" alt="logo"> --}}

                                <h2>{{ $item->course_name }}</h2>
                            </div>
                            <div class="info">
                                <h4>{{ $item->course_short_des }}</h4>
                                <p>{!! $item->course_desceiption !!}</p>
                            </div>
                            <div class="session d-flex align-items-center">
                                <div class="box">
                                    <span><i class="fa-regular fa-calendar"></i></span>
                                    <p>Starts</p>
                                    <h4>{{ \Carbon\Carbon::parse($item->start_date)->format("j M, Y") }}</h4>
                                </div>
                                <div class="box">
                                    <span><i class="fa-regular fa-clock"></i></span>
                                    <p>Program Duration</p>
                                    <h4>{{ $item->course_duration }}</h4>
                                </div>
                                <div class="box">
                                    <span><i class="fa-solid fa-graduation-cap"></i></span>
                                    <p>Learning Format</p>
                                    <h4>Online Bootcamp</h4>
                                </div>
                            </div>
                            {{-- <button class="applyBtn">Apply Now</button> --}}
                            <a href="#contact" class="applybutton applyBtn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- landing banner section end here -->


    <!-- program section start here -->
    <div class="program__section section__gap">
        <div class="container">
            <div class="program__inner">
                <div class="program__title">
                    <h3 class="text-center">Why Join <span>this Program</span></h3>
                </div>
                <div class="program__boxes d-flex justify-content-center justify-content-lg-between flex-wrap flex-xl-nowrap">
                    @forelse ($programs as $program)
                        <div class="program__box m-4 m-lg-0">
                            <img src="{{ asset($program->image) }}" alt="icon">
                            <h4>{{ $program->title }}</h4>
                            <p>{{ $program->description }}</p>
                        </div>
                    @empty
                        <div class="notfound" style="text-align:center !important; width:100%">
                            <h4 style="color:red; font-weight:700">Data not found !!!</h2>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- program section end here -->


    <!-- overview section start here -->
    <div class="overview__section section__gap">
        <div class="container">
            <div class="overview__inner">
                <div class="overview__title text-center">
                    <h4>Program Overview</h4>
                    <p>This UI UX Bootcamp by Umass Amherst helps you learn a design centric
                        approach towards user interface and user Experience , including UX
                        research, UI styling , User centered design process , Wireframes;
                        Prototypes, Usability Testing. Practice via Capstone Projects;
                        course wide assignments and projects & amp.
                    </p>
                </div>

                <div class="overview__box">
                    <div class="row">
                        <div class="col-md-6">
                            @forelse ($program_overview as $key => $item)
                            <div class="preBox "> 
                                @if ($key % 2 == 0)
                                <div class="overview">
                                    <p>{{ $item->overview_content }}</p>
                                    <span>0{{ $loop->index+1 }}</span>
                                </div>  
                                @endif
                            </div>
                            @empty
                                <h4 class="text-danger">Data not found </h4>
                            @endforelse
                        </div>
                        <div class="col-md-6">
                            @forelse ($program_overview as $key => $item)
                            <div class="preBox "> 
                                @if ($key % 2 !== 0)
                                <div class="overview">
                                    <p>{{ $item->overview_content }}</p>
                                    <span>
                                        @if ($loop->index+1 >= 10)
                                            {{ $loop->index+1 }}
                                        @else
                                            0{{ $loop->index+1 }}
                                        @endif
                                    </span>
                                </div>  
                                @endif
                            </div>
                            @empty
                                <h4 class="text-danger">Data not found </h4>
                            @endforelse
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- overview section end here -->


    <!-- application section start here -->
    <div class="application__section section__gap" id="contact">
        <div class="container">
            <div class="application__inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="application service__form">
                            <h4>Start Application</h4>
                            {{-- <form>
                                <input type="text" placeholder="Name" required>
                                <input type="email" placeholder="Email*" required>
                                <input type="tel" id="phone">
                                <input type="text" placeholder="Work Experience*" required>
                                <button class="applyBtn">Apply Now</button>
                                <p>By  providing your contact details you agree to <a href="#!">privacy policy</a></p>
                            </form> --}}

                            <form action="{{ route('contact') }}" method="post">
                                @csrf
                                <div class="formInput">
                                    <input type="text" placeholder="Name*" name="name" required>
                                    <input type="email" name="email" placeholder="Email*" required>
                                </div>
                                <div class="formInput">
                                    <input type="tel" id="phone" name="phone">
                                </div>
                                <div>
                                    <textarea placeholder="Message" name="message" id=""  rows="1" style="width: 100%;" required></textarea>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input mb-0 me-2" id="check2" name="option2" value="something" style="width: unset !important; border: 1px solid #d5d5d5;
                                    padding: 10px; cursor: pointer;">
                                    <label class="form-check-label" for="check2" style=" color: #33334d; user-select: none; cursor: pointer;">Opt in marketing communication Privacy Statement</label>
                                </div>
                                <button class="applyBtn mt-4" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="application">
                            <h4>Program Benefits</h4>
                            <div class="benifits__box">
                                <div class="benifit">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset('frontend/assets/image/icon/benefits.png') }}" alt="icon">
                                        <p>Earn a UMass Amherst certificate while working</p>
                                    </div>
                                </div>
                                <div class="benifit">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset('frontend/assets/image/icon/benefits.png') }}" alt="icon">
                                        <p>Earn a UMass Amherst certificate while working</p>
                                    </div>
                                </div>
                                <div class="benifit">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset('frontend/assets/image/icon/benefits.png') }}" alt="icon">
                                        <p>Earn a UMass Amherst certificate while working</p>
                                    </div>
                                </div>
                                <div class="benifit">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset('frontend/assets/image/icon/benefits.png') }}" alt="icon">
                                        <p>Earn a UMass Amherst certificate while working</p>
                                    </div>
                                </div>
                                <div class="benifit mb-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ asset('frontend/assets/image/icon/benefits.png') }}" alt="icon">
                                        <p>Earn a UMass Amherst certificate while working</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- application section end here -->

@endsection


