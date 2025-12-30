@extends('layouts.app')

@section('content')

<section class="page-banner-area">
    <div class="container">
        <div class="banner-content text-center">
            <h1>{{ $instructor->name }}</h1>
            <p>
                <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                <span> > </span>
                <a href="{{ route('instructors') }}">المدربين</a>
                <span> > </span>
                {{ $instructor->name }}
            </p>
        </div>
    </div>
</section>

<section class="inst-profile-area">
    <div class="container">
        <div class="row">

            <!-- profile -->
            <div class="col-lg-4 col-md-5">
                <div class="instructor-info">
                    <div class="instructor-img">
                        <img src="{{ $instructor->pictureUrl }}" class="img-fluid" alt="{{ $instructor->name }}">
                    </div>
                    <div class="instructor-details">
                        <h4>{{ $instructor->name }}</h4>
                        <p>{{ $instructor->title }}</p>
                    </div>
                </div>
            </div>

            <!-- details -->
            <div class="col-lg-8 col-md-7">
                <div class="about-instructor">
                    <h3>من أنا؟</h3>
                    <p>{{ $instructor->bio }}</p>
                </div>

                <div class="experience">
                    <h3>الخبرة</h3>
                    <p>{{ $instructor->experience_years }} سنة خبرة</p>
                </div>

                <!-- courses -->
                <div class="courses">
                    <h3 class="mb-3">البرامج التدريبية</h3>

                    <div class="row cards-container">
                        @forelse($instructor->courses as $course)
                            <div class="col-lg-6">
                                <div class="course-card">
                                    <div class="course-thumbnail">
                                        <a href="{{ route('courses.show', $course) }}">
                                            <img src="{{ $course->pictureUrl }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <span class="price english-font">
                                            <mark>{{ $course->price }} د.ل</mark>
                                        </span>

                                        <h3 class="course-title">
                                            <a href="{{ route('courses.show', $course) }}">
                                                {{ $course->title }}
                                            </a>
                                        </h3>

                                        <div class="doctor-name">
                                            <span>{{ $instructor->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>لا توجد دورات حالياً</p>
                        @endforelse
                    </div>

                    <div class="category-btn btn-default text-center">
                        <a href="{{ route('courses') }}">تصفح كل الكورسات</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
