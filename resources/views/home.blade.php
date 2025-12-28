<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apex Dental Academy - Browse Courses</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #478AB1;
            --accent: #1877AF;
            --light: #E7E4E4;
            --dark-color: #1f2937;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
        }
        
        .hero-section {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,133.3C960,128,1056,96,1152,90.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }
        
        .course-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        .course-image {
            height: 200px;
            object-fit: cover;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }
        
        .course-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--accent);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .instructor-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .navbar {
            background: white !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .btn-register {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(71, 138, 177, 0.3);
            color: white;
        }
        
        .stats-section {
            padding: 60px 0;
            background: white;
        }
        
        .stat-card {
            text-align: center;
            padding: 30px;
            border-radius: 12px;
            background: var(--light-bg);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 3rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/no_background.png') }}" alt="Apex Dental Academy Logo" style="height: 40px; margin-right: 10px;">
                Apex Dental Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Courses</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Transform Your Future with Apex Dental Academy</h1>
                    <p class="lead mb-4">Discover world-class dental courses taught by industry experts. Start your learning journey today and unlock your full potential.</p>
                    <div class="d-flex gap-3">
                        <a href="#courses" class="btn btn-light btn-lg">Browse Courses</a>
                        <a href="{{ route('course_registrations.create') }}" class="btn btn-outline-light btn-lg">Register Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <i class="fas fa-book-open" style="font-size: 12rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $courses->count() }}</div>
                        <div class="stat-text">Available Courses</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $courses->sum('duration') }}</div>
                        <div class="stat-text">Total Hours</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ $courses->pluck('instructorId')->unique()->count() }}</div>
                        <div class="stat-text">Expert Instructors</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stat-card">
                        <div class="stat-number">{{ number_format($courses->avg('price'), 0) }}</div>
                        <div class="stat-text">Avg. Price ($)</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Featured Courses</h2>
                <p class="section-subtitle">Choose from our wide range of courses and start learning today</p>
            </div>
            
            @if($courses->count() > 0)
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card course-card">
                                <div class="position-relative">
                                    @if($course->pictureUrl)
                                        <img src="{{ $course->pictureUrl }}" class="card-img-top course-image" alt="{{ $course->title }}">
                                    @else
                                        <div class="course-image">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    @endif
                                    <div class="course-badge">
                                        {{ $course->duration }}h
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    
                                    <div class="instructor-info mb-3">
                                        <i class="fas fa-user-tie"></i>
                                        <span>{{ $course->instructor ? $course->instructor->name : 'Expert Instructor' }}</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="price-tag">${{ number_format($course->price, 2) }}</div>
                                        <a href="{{ route('course_registrations.create') }}?course_id={{ $course->id }}" class="btn btn-register">
                                            Register Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h3 class="text-muted">No courses available at the moment</h3>
                    <p class="text-muted">Check back later for exciting new courses!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-graduation-cap me-2"></i>Apex Dental Academy</h5>
                    <p class="text-muted">Empowering dental professionals worldwide with quality education.</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-3 bg-secondary">
            <div class="text-center">
                <small>&copy; {{ date('Y') }} Apex Dental Academy. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
