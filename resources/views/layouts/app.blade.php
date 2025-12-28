<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    @include('partials.head')
</head>

<body>

@include('partials.navbar')

<main>
    @yield('content')
</main>

@include('partials.footer')
@include('partials.scripts')

</body>
</html>
