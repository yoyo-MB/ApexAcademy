@extends('layouts.app')

@section('content')

<!-- Page Banner -->
<section class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 z-index-2">
                <div class="banner-content text-center">
                    <h1>المدربين</h1>
                    <p>
                        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                        <span> > </span>
                        المدربين
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Area -->
<section class="team-area">
    <div class="container">

        <!-- Heading -->
        <div class="row_1">
            <div class="col-lg-8 offset-lg-2">
                <div class="sec-heading text-center">
                    <h4>المدربين</h4>
                    <h2>خبراء المجال لدينا!</h2>
                </div>
            </div>
        </div>

        <!-- Instructors -->
        <div class="row cards-container">

            <!-- Instructor 1 -->
            <div class="col-md-4">
                <div class="instructor-single">
                    <div class="instructor-image">
                        <img
                            src="{{ asset('assets/images/instructor1.png') }}"
                            class="img-fluid"
                            alt="د. أحمد شوقي"
                        >
                    </div>
                    <div class="instructor-body text-center">
                        <h4>د . أحمد شوقي</h4>
                        <p>طبيب أسنان - أخصائي تركيبات ثابتة</p>
                    </div>
                </div>
            </div>

            <!-- Instructor 2 -->
            <div class="col-md-4">
                <div class="instructor-single">
                    <div class="instructor-image">
                        <img
                            src="{{ asset('assets/images/instructor2.png') }}"
                            class="img-fluid"
                            alt="د. خديجة الفلاح"
                        >
                    </div>
                    <div class="instructor-body text-center">
                        <h4>د . خديجة الفلاح</h4>
                        <p>أخصائية تركيبات ثابتة وزراعة</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
