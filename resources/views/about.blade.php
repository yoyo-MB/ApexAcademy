@extends('layouts.app')

@section('content')

<!-- Page Banner -->
<section class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 z-index-2">
                <div class="banner-content text-center">
                    <h1>من نحن</h1>
                    <p>
                        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                        <span> &gt; </span>
                        من نحن
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about_us-section">
    <div class="container">

        <!-- Images -->
        <div class="row g-4 mb-4">
            <div class="col-md-4 about_us-img">
                <img src="{{ asset('assets/images/about_us1.jpg') }}" alt="Dental Equipment">
            </div>
            <div class="col-md-4 about_us-img">
                <img src="{{ asset('assets/images/about_us2.jpg') }}" alt="Dental Chair">
            </div>
            <div class="col-md-4 about_us-img">
                <img src="{{ asset('assets/images/about_us3.jpg') }}" alt="Dental Tools">
            </div>
        </div>

        <!-- Title -->
        <div class="text-center">
            <h6>من نحن</h6>
            <h2>أكاديمية قراند لطب الأسنان</h2>
        </div>

        <!-- Text -->
        <div class="about_us-text text-center mt-4">
            <p>
                أكاديمية قراند هي أكاديمية متخصصة لتعليم أطباء الأسنان، تسعى لتقديم محتوى علمي مميز
                وفرص تعليم شاملة في مختلف مجالات طب الأسنان.
            </p>
            <p>
                تعتمد الأكاديمية على مناهج حديثة تجمع بين الجانب النظري والتدريب العملي المكثف،
                باستخدام أحدث الأجهزة والتقنيات لتأهيل أطباء الأسنان حديثي التخرج.
            </p>
            <p>
                تهدف الأكاديمية إلى إعداد جيل من أطباء الأسنان المؤهلين تأهيلاً عاليًا،
                القادرين على تقديم رعاية صحية متميزة وفق المعايير الأخلاقية والمهنية.
            </p>
        </div>

        <!-- Stats -->
        <div class="row text-center stats mt-4">
            <div class="col-md-4 stat-item">
                <h3>4000</h3>
                <p>خريج</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>80</h3>
                <p>مدرب</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>100%</h3>
                <p>نسبة التفوق</p>
            </div>
        </div>

    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-area three bg-gray">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="sec-heading text-center">
                    <h4>أفضل مكان للتعلم</h4>
                    <h2>لماذا نحن الأفضل؟</h2>
                </div>
            </div>
        </div>

        <div class="row text-center cards-container">

            <div class="col-md-4">
                <div class="choose-single three">
                    <div class="why-choose-icon three">
                        <img src="{{ asset('assets/images/dentist.svg') }}" alt="">
                    </div>
                    <div class="why-choose-cont three">
                        <h3>أطقم أطباء من مصر والعالم</h3>
                        <p>
                            نضم كوادر تعليمية وطبية ذات خبرات متنوعة من داخل ليبيا وخارجها
                            لتبادل المعرفة وتقديم أفضل تجربة تعليمية.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="choose-single three">
                    <div class="why-choose-icon three">
                        <img src="{{ asset('assets/images/dentist.svg') }}" alt="">
                    </div>
                    <div class="why-choose-cont three">
                        <h3>أفضل هيئة تدريس في ليبيا</h3>
                        <p>
                            نعتمد على نخبة من أعضاء هيئة التدريس الليبيين ذوي الكفاءة العالية
                            لضمان تعليم احترافي ومتميز.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="choose-single three">
                    <div class="why-choose-icon three">
                        <img src="{{ asset('assets/images/dentist.svg') }}" alt="">
                    </div>
                    <div class="why-choose-cont three">
                        <h3>الميكروسكوب لأول مرة في ليبيا</h3>
                        <p>
                            أول أكاديمية في ليبيا تستخدم الميكروسكوب في التدريب العملي
                            لرفع دقة التشخيص والعلاج.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
