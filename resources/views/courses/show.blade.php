@extends('layouts.app')

@section('content')

<!-- Page Banner -->
<section
    class="page-banner-area course-single-banner"
    style="background-image: url('{{ $course->pictureUrl }}');"
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>{{ $course->title }}</h1>
                    <p>
                        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                        <span> > </span>
                        البرامج التدريبية
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Single Area -->
<section class="course-single-area">
    <div class="container">
        <div class="row">

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="course-single-content">

                    <div class="course-content-tab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active">معلومات البرنامج</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="course-about-cont">
                                    <h3>حول البرنامج</h3>
                                    <p>{{ $course->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="course-single-meta">
    <a 
        href="{{ route('instructors.show', $course->instructor->id) }}" 
        class="course-author d-flex align-items-center"
    >
        <img
            src="{{ $course->instructor->pictureUrl }}"
            alt="{{ $course->instructor->name }}"
            style="
                width: 50px;
                height: 50px;
                border-radius: 50%;
                object-fit: cover;
                margin-left: 10px;
            "
        >

        <strong>{{ $course->instructor->name }}</strong>
    </a>
</div>


                </div>
            </div>
<!-- Sidebar Card -->
<div class="col-lg-4">
    <div class="course-sidebar-two">
        <div class="card">
            <!-- Card Image -->
            <div class="card-thumbnail">
                <img 
                    src="{{ $course->pictureUrl }}"
                    class="img-fluid"
                    alt="{{ $course->title }}"
                >
            </div>
            
            <!-- Card Body -->
            <div class="card-body">
                <!-- Price -->
                <div class="price-section">
                    <span class="price english-font">
                        {{ $course->price }} د.ل
                    </span>
                </div>
                
                <!-- Enroll Button -->
                <div class="enroll-btn-section">
                    <a 
                        href="{{ route('course_registrations.create', ['course_id' => $course->id]) }}"
                        class="btn-enroll"
                    >
                        <i class="fa fa-user-plus me-2"></i>التسجيل في الدورة
                    </a>
                </div>
                
                <!-- Course Info -->
                <div class="course-info-section">
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fa fa-clock"></i> المدة:
                        </span>
                        <span class="info-value">
                            {{ $course->duration }} ساعة
                        </span>
                    </div>
                    
                    <!-- يمكن إضافة معلومات إضافية هنا إذا كانت متوفرة -->
                    @if($course->instructor)
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fa fa-user"></i> المدرب:
                        </span>
                        <span class="info-value">
                            {{ $course->instructor->name }}
                        </span>
                    </div>
                    @endif
                    
                    @if($course->lessons_count)
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fa fa-book"></i> الدروس:
                        </span>
                        <span class="info-value">
                            {{ $course->lessons_count }} درس
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</section>

@endsection
