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

                    <li class="slide {{ request()->routeIs('courses*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('courses*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-layers"></i><span
                                class="side-menu__label">Courses</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('courses.index') }}" class="slide-item {{ request()->routeIs('courses.index') ? 'active' : '' }}">Courses</a></li>
                            <li><a href="{{ route('courses.create') }}" class="slide-item {{ request()->routeIs('courses.create') ? 'active' : '' }}">Add Course</a></li>
                        </ul>
                    </li>
                    <li class="slide {{ request()->routeIs('batch*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('batch*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-users"></i><span
                                class="side-menu__label">Batches</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('batch.index') }}" class="slide-item {{ request()->routeIs('batch.index') ? 'active' : '' }}">Batches</a></li>
                            <li><a href="{{ route('batch.create') }}" class="slide-item {{ request()->routeIs('batch.create') ? 'active' : '' }}">Add Batch</a></li>
                        </ul>
                    </li>
                    <li class="slide {{ request()->routeIs('class-content*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('class-content*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Classes</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('class-content.index') }}" class="slide-item {{ request()->routeIs('class-content.index') ? 'active' : '' }}">Classes</a></li>
                            <li><a href="{{ route('class-content.create') }}" class="slide-item {{ request()->routeIs('class-content.create') ? 'active' : '' }}">Add Class</a></li>
                        </ul>
                    </li>

                    <li class="slide {{ request()->routeIs(['student.index','student.create','student.edit']) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs(['student.index','student.create','student.edit']) ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Students</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('student.index') }}" class="slide-item {{ request()->routeIs('student.index') ? 'active' : '' }}">Students</a></li>
                            <li><a href="{{ route('student.create') }}" class="slide-item {{ request()->routeIs('student.create') ? 'active' : '' }}">Add Student</a></li>
                        </ul>
                    </li>


                    <li class="slide {{ request()->routeIs('assignstudent*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('assignstudent*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user-check"></i><span
                                class="side-menu__label">Assign Student</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('assignstudent.index') }}" class="slide-item {{ request()->routeIs('assignstudent.index') ? 'active' : '' }}">Assign Student List</a></li>
                            <li><a href="{{ route('assignstudent.create') }}" class="slide-item {{ request()->routeIs('assignstudent.create') ? 'active' : '' }}">Add Assign Student</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('students.management') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('students.management') }}"><i
                                class="side-menu__icon fe fe-briefcase"></i><span
                                class="side-menu__label">Student Management</span></a>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('social_links.index') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('contact.index') }}"><i
                                class="side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Social Links</span></a>
                    </li>


                    <li class="slide {{ request()->routeIs('social_links*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('social_links*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user-check"></i><span
                                class="side-menu__label">Social Link</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu"> 
                            <li><a href="{{ route('social_links.index') }}" class="slide-item {{ request()->routeIs('social_links.index') ? 'active' : '' }}"> Social Link List</a></li>
                          
                        </ul>
                    </li>
 
                    <li class="slide {{ request()->routeIs('programs*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('programs*') ? 'is-expanded active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user-check"></i><span
                                class="side-menu__label">Program Content</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu"> 
                            <li>
                                <a href="{{ route('programs.index') }}" class="slide-item {{ request()->routeIs('programs.index') ? 'active' : '' }}">   Program List</a>
                            </li>

                            <li>
                                <a href="{{ route('programs.create') }}" class="slide-item {{ request()->routeIs('programs.create') ? 'active' : '' }}">   Add Program Conent</a>
                            </li>
                          
                        </ul>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item has-link {{ request()->routeIs('site_logo.index') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('site_logo.index') }}"><i
                                class="side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Site logo</span></a>
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
