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

            @foreach ($homeCourses ?? [] as $course)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="course-thumbnail">
                            <a href="{{ route('courses.show', $course->slug ?? $course->id) }}">
                                <img
                                    src="{{ $course->pictureUrl }}"
                                    class="img-fluid"
                                    alt="{{ $course->title }}"
                                >
                            </a>
                        </div>

                        <div class="course-content">
                            <span class="course-price english-font">
                                <mark>{{ $course->price }} د.ل</mark>
                            </span>

                            <h3 class="course-title">
                                {{ $course->title }}
                            </h3>

                            @if ($course->instructor)
                                <div class="doctor-name">
                                    د . {{ $course->instructor->name }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="category-btn btn-default text-center">
                    <a href="{{ route('courses') }}">تصفح كل الدورات</a>
                </div>
            </div>
        </div>

    </div>
</section>
