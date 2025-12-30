<section class="team-area">
    <div class="container">

        <div class="row_1">
            <div class="col-lg-8 offset-lg-2">
                <div class="sec-heading text-center">
                    <h4>المدربين</h4>
                    <h2>خبراء المجال لدينا!</h2>
                </div>
            </div>
        </div>

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

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="category-btn btn-default text-center">
                    <a href="{{ route('instructors') }}">كل المدربين</a>
                </div>
            </div>
        </div>

    </div>
</section>
