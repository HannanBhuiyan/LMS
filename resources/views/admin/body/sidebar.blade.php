<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('backend') }}/assets/images/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('backend') }}/assets/images/logo.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('backend') }}/assets/images/logo.png" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('backend') }}/assets/images/logo.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                @if (!Auth::guard('admin')->check())
                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Student Dashboard</span></a>
                    </li>
                    @if (Auth::user()->isban == 0)
                        <li class="slide">
                            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('student.showallcourses') }}"><i
                                    class="side-menu__icon fe fe-layers"></i><span
                                    class="side-menu__label">Your Course</span></a>
                        </li>
                    @endif
                @endif

                @if (Auth::guard('admin')->check())

                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"><i
                                class="side-menu__icon fe fe-home"></i><span
                                class="side-menu__label">Dashboard</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('banner.index') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('banner.index') }}"><i
                                class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Banner</span></a>
                    </li>

                    <li class="slide {{ request()->routeIs(['courses.index', 'courses.create', 'courses.index', 'courses.edit', 'programs.index', 'programs.create', 'programs.show', 'programs.edit', 'program_overview.index', 'program_overview.edit', 'program_overview.create']) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs(['courses.index', 'courses.create', 'courses.index', 'courses.edit', 'programs.index', 'programs.create', 'programs.show', 'programs.edit', 'program_overview.index', 'program_overview.edit', 'program_overview.create']) ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-layers"></i><span
                                class="side-menu__label">Courses</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('courses.index') }}" class="slide-item {{ request()->routeIs('courses*') ? 'active' : '' }}">Courses</a></li>
                            <li><a href="{{ route('programs.index') }}" class="slide-item {{ request()->routeIs('programs*') ? 'active' : '' }}">Course Content</a></li> 
                            {{-- <li><a href="{{ route('program_overview.index') }}" class="slide-item {{ request()->routeIs('program_overview.index') ? 'active' : '' }}">Course Overview List</a></li> --}}
                        </ul> 
                    </li>


                    <li class="slide {{ request()->routeIs(['chapter*', 'batch*' ,'class-content*']) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs(['chapter*', 'batch*', 'class-content*']) ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-package"></i><span
                                class="side-menu__label">Class Management</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('batch.index') }}" class="slide-item {{ request()->routeIs('batch*') ? 'active' : '' }}">Batch</a></li>
                            <li><a href="{{ route('chapter.index') }}" class="slide-item {{ request()->routeIs('chapter*') ? 'active' : '' }}">Chapter</a></li>
                            <li><a href="{{ route('class-content.index') }}" class="slide-item {{ request()->routeIs(['class-content*']) ? 'active' : '' }}">Class Content</a></li>  
                        </ul>
                    </li>
  
                    <li class="slide {{ request()->routeIs(['student.index','student.create','student.edit', 'assignstudent.index', 'assignstudent.create', 'assignstudent.edit']) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs(['student.index','student.create','student.edit', 'assignstudent.index', 'assignstudent.create', 'assignstudent.edit']) ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Student Management</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('student.index') }}" class="slide-item {{ request()->routeIs('student*') ? 'active' : '' }}">Students</a></li>
                            <li><a href="{{ route('assignstudent.index') }}" class="slide-item {{ request()->routeIs('assignstudent*') ? 'active' : '' }}">Assign Student</a></li>
                        </ul>
                    </li> 
  
                    <li class="slide {{ request()->routeIs('blog*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('blog*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-file"></i><span
                                class="side-menu__label">Blog</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('blog.index') }}" class="slide-item {{ request()->routeIs('blog.index') ? 'active' : '' }}"> Blog List</a></li>
                            <li><a href="{{ route('blog.create') }}" class="slide-item {{ request()->routeIs('blog.create') ? 'active' : '' }}">Add Blog</a></li>
                        </ul>
                    </li>


                    <li class="slide {{ request()->routeIs('social_links*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('social_links*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-globe"></i><span
                                class="side-menu__label">Settings</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu"> 
                            <li><a href="{{ route('social_links.index') }}" class="slide-item {{ request()->routeIs('social_links.index') ? 'active' : '' }}">Social Links</a></li>
                            <li><a href="{{ route('site_logo.index') }}" class="slide-item {{ request()->routeIs('site_logo.index') ? 'active' : '' }}">Site Logo</a></li>
                           
                        </ul>
                    </li>
    
                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('contact.index') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('contact.index') }}"><i
                                class="side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Message</span></a>
                    </li>

                @endif

            </ul>
        </div>

    </div>
    <!--/APP-SIDEBAR-->
</div>
