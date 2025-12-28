@extends('layouts.app')

@section('content')

<!-- Page Banner -->
<section class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 z-index-2">
                <div class="banner-content text-center">
                    <h1>البرامج التدريبية</h1>
                    <p>
                        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                        <span> > </span>
                        الدورات التدريبية
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Area -->
<section class="course-area">
    <div class="container">

        <div class="row_1">
            <div class="col-lg-8 offset-lg-2">
                <div class="sec-heading text-center">
                    <h4>البرامج التدريبية</h4>
                    <h2>اكتشف برامجنا التدريبية</h2>
                </div>
            </div>
        </div>

        <div class="row cards-container">

            @foreach ($courses as $course)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-card">

                        <div class="course-thumbnail">
                            <img src="{{ $course->pictureUrl }}" class="img-fluid">
                        </div>

                        <div class="course-content">
                            <span class="course-price english-font">
                                <mark>{{ $course->price }} د.ل</mark>
                            </span>

                            <h3 class="course-title">
                                {{ $course->title }}
                            </h3>

                            <div class="doctor-name">
                                د . {{ $course->instructor->name }}
                            </div>

                            <a href="{{ route('courses.show', $course->slug) }}"
                               class="btn btn-sm btn-primary mt-2">
                                عرض التفاصيل
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <br><br>
</section>

@endsection
