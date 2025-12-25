<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful - Apex Dental Academy</title>
    
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
        
        .success-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 2rem auto;
            padding: 3rem;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(180deg, var(--primary), var(--accent));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
        }
        
        .btn-primary {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(71, 138, 177, 0.3);
        }
        
        .btn-outline-secondary {
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .header-section {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .logo img {
            max-width: 80px;
        }
        
        .info-card {
            background: var(--light-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .info-card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .info-list li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .info-list li:before {
            content: "•";
            color: var(--primary);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header-section">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('assets/images/no_background.png') }}" alt="Apex Dental Academy">
                <h2 class="mt-2">Apex Dental Academy</h2>
            </div>
        </div>
    </div>

    <!-- Success Content -->
    <div class="container">
        <div class="success-container">
            <div class="text-center">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h1 class="display-5 fw-bold mb-4">Registration Successful!</h1>
                <p class="lead text-muted mb-5">
                    Thank you for registering for the course. We have received your registration and will contact you shortly with further details.
                </p>
            </div>

            <div class="info-card">
                <h3><i class="fas fa-info-circle me-2"></i>What's Next?</h3>
                <ul class="info-list">
                    <li>You will receive a confirmation email shortly</li>
                    <li>Our team will review your registration and contact you with course details</li>
                    <li>Payment information and schedule will be provided via email</li>
                </ul>
            </div>

            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('course_registrations.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Register Another Course
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
