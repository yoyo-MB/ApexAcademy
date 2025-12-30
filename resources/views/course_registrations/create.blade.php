<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>التسجيل في الدورة - أكاديمية أبيكس</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #478AB1;
            --accent: #1877AF;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            direction: rtl;
            text-align: right;
        }

        .registration-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,.1);
            max-width: 800px;
            margin: 2rem auto;
            padding: 3rem;
        }

        .course-box {
            background: #f1f5f9;
            border-right: 5px solid var(--primary);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .btn-primary {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
        }
        .required-star {
         color: #dc3545; /* Bootstrap danger red */
        font-weight: 700;
         margin-right: 4px;
    }

    </style>
</head>

<body>

@php
    $selectedCourse = $courses->firstWhere('id', request('course_id'));
@endphp

<div class="container">
    <div class="registration-container">

        <h1 class="text-center mb-4">نموذج التسجيل في الدورة</h1>
        <p class="text-center text-muted mb-4">
            يرجى التأكد من بيانات الدورة قبل إكمال التسجيل
        </p>

        @if(!$selectedCourse)
            <div class="alert alert-danger">
                لم يتم تحديد دورة صحيحة. يرجى الرجوع واختيار الدورة مرة أخرى.
            </div>
        @else

            <!-- Course Info -->
            <div class="course-box">
                <h5 class="mb-3">الدورة المختارة</h5>

                <p class="mb-1">
                    <strong>اسم الدورة:</strong>
                    {{ $selectedCourse->title }}
                </p>

                <p class="mb-0">
                    <strong>سعر الدورة:</strong>
                    {{ $selectedCourse->price }} د.ل
                </p>
            </div>

            <form method="POST" action="{{ route('course_registrations.store') }}">
                @csrf

                <!-- hidden course id -->
                <input type="hidden" name="course_id" value="{{ $selectedCourse->id }}">

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">الاسم الأول <span class="required-star">*</span></label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">اسم العائلة <span class="required-star">*</span></label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">البريد الإلكتروني <span class="required-star">*</span></label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">رقم الهاتف <span class="required-star">*</span></label>
                    <input type="text" name="phone_number" class="form-control" required>
                </div>

                @if(config('no-captcha.sitekey'))
                    <div class="mb-4">
                        {!! NoCaptcha::display() !!}
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        رجوع
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check ms-2"></i>
                        تأكيد التسجيل
                    </button>
                </div>
            </form>

        @endif
    </div>
</div>

</body>
</html>
