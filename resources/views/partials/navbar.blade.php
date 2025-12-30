<header class="header-area sticky">



<div class="header-btm-area">
    <div class="container">
        <div class="main-menu-wrap">
            <div class="site-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logoG.png') }}" alt="logo">
                </a>
            </div>
            <div class="admin-portal-btn">
                <a href="{{ route('login') }}" class="admin-btn">Admin Portal</a>
            </div>
     <div class="main-menu-area text-right">
            <nav class="mainmenu">
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="{{ route('courses') }}">الدورات التدريبية</a></li>
                    <li><a href="{{ route('instructors') }}">المحاضرين</a></li>
                    <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
                </ul>
            </nav>
        </div>

        </div>
    </div>
</div>

</header>
<!-- header area end -->