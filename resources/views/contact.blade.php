@extends('layouts.app')

@section('content')

<!-- start hero area -->
<section class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 z-index-2">
                <div class="banner-content text-center">
                    <h1>تواصل معنا</h1>
                    <p>
                        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
                        <span> &gt; </span>
                        اتصل بنا
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end hero area -->

<!-- start contact area -->
<section class="contact-area">
    <div class="container">
        <div class="contact-wrapper">

            <!-- Right side -->
            <div class="contact-right">
                <div class="contact-desc">
                    <h2>اترك لنا رسالة</h2>
                    <p>
                        يسعدنا التواصل معكم وتقديم الدعم والمساعدة في كل ما يخصنا.
                        نحن نؤمن بأهمية التواصل المباشر والفعّال مع عملائنا.
                    </p>

                    <div class="contact-info">

                        <div class="contact-info-single">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/email.svg') }}" alt="email">
                            </div>
                            <div class="contact-cont">
                                <h3>بريدنا الإلكتروني :</h3>
                                <a href="mailto:info@apexdentalacademy.com.ly">
                                    <span class="english-font">
                                        info@apexdentalacademy.com.ly
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="contact-info-single">
                            <div class="contact-icon phone-icon">
                                <img src="{{ asset('assets/images/telephone.svg') }}" alt="phone">
                            </div>
                            <div class="contact-cont">
                                <h3>رقم هاتفنا :</h3>
                                <a href="tel:091-0363366">
                                    <span dir="ltr">091-0363366</span>
                                </a>
                            </div>
                        </div>

                        <div class="contact-info-single">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/map.svg') }}" alt="map">
                            </div>
                            <div class="contact-cont">
                                <h3>موقعنا :</h3>
                                <a href="https://www.google.com/maps/dir//Grandental+academy"
                                   target="_blank">
                                    شارع فينيسيا، بنغازي، ليبيا
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Left side -->
            <div class="contact-left">
                <div class="contact-form">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <input type="text" name="name" class="form-control" placeholder="الإسم">
                        <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني">
                        <input type="text" name="subject" class="form-control" placeholder="الموضوع">
                        <textarea name="message" rows="4" class="form-control" placeholder="اكتب رسالتك"></textarea>

                        <div class="submit-btn">
                            <button type="submit" class="btn">ارسل الآن</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end contact area -->

<!-- map -->


@endsection
