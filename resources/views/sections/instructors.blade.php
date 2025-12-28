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

            <div class="col-md-4">
                <div class="instructor-single">
                    <div class="instructor-image">
                        <img src="{{ asset('assets/images/instructor1.png') }}"
                             class="img-fluid" alt="">
                    </div>
                    <div class="instructor-body text-center">
                        <h4>د . أحمد شوقي</h4>
                        <p>طبيب أسنان – أخصائي تركيبات ثابتة</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="instructor-single">
                    <div class="instructor-image">
                        <img src="{{ asset('assets/images/instructor2.png') }}"
                             class="img-fluid" alt="">
                    </div>
                    <div class="instructor-body text-center">
                        <h4>د . خديجة الفلاح</h4>
                        <p>أخصائية تركيبات ثابتة وزراعة</p>
                    </div>
                </div>
            </div>

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
