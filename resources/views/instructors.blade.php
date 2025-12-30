
@extends('layouts.app')

@section('content')

<section class="page-banner-area">
    <div class="container">
        <div class="banner-content text-center">
            <h1>المدربين</h1>
            <p>
                <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                <span> > </span> المدربين
            </p>
        </div>
    </div>
</section>

<section class="team-area">
    <div class="container">
        <div class="row cards-container">

            @foreach($instructors as $instructor)
                <div class="col-md-4">
                    <a href="{{ route('instructors.show', $instructor) }}" class="text-decoration-none">
                        <div class="instructor-single">
                            <div class="instructor-image">
                                <img src="{{ $instructor->pictureUrl }}" class="img-fluid">
                            </div>
                            <div class="instructor-body text-center">
                                <h4>{{ $instructor->name }}</h4>
                                <p>{{ $instructor->title }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
