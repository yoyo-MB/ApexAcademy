<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Apex Dental Academy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root{
  --primary:#478AB1;
  --accent:#1877AF;
  --light:#E7E4E4;
}
body {
  background:#f8f9fa;
  margin: 0;
  padding: 0;
  overflow-x: hidden; /* Prevent horizontal scroll */
  min-height: 100vh;
}

/* Sidebar fixed position */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 220px; /* fixed width */
  background: linear-gradient(180deg, var(--primary), var(--accent));
  padding: 1rem;
  overflow-y: auto;
  z-index: 1000;
}

/* Sidebar links */
.sidebar a {
  color: white;
  text-decoration: none;
  display: flex;
  align-items: center;
  padding: 10px 14px;
  border-radius: 10px;
  font-weight: 500;
  transition: all .2s ease;
}

.sidebar a:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #fff;
}

.sidebar a.active {
  background: rgba(255, 255, 255, 0.28);
  font-weight: 600;
}

.sidebar i {
  font-size: 1.1rem;
  margin-right: 8px;
}

/* Main content area */
main {
  margin-left: 220px; /* same as sidebar width */
  padding: 2rem;
}

/* Responsive tweaks */
@media (max-width: 768px) {
  .sidebar {
    width: 180px;
  }
  main {
    margin-left: 180px;
    padding: 1rem;
  }

  .sidebar img {
    max-width: 90px;
    margin: 0 auto 1rem auto;
    display: block;
  }
}
</style>
</head>
<body>

<aside class="sidebar">
  <!-- Logo -->
  <div class="text-center mb-4">
    <img src="{{ asset('assets/images/no_background.png') }}" alt="Apex Dental Academy Logo" class="img-fluid" style="max-width:110px;">
  </div>

  <!-- Navigation -->
  <nav class="nav flex-column gap-2">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="bi bi-speedometer2"></i>
      Dashboard
    </a>
    <a href="{{ route('instructor.index') }}" class="nav-link {{ request()->routeIs('instructor.*') ? 'active' : '' }}">
      <i class="bi bi-person-badge-fill"></i>
      Instructors
    </a>
    <a href="{{ route('course.index') }}" class="nav-link {{ request()->routeIs('course.*') ? 'active' : '' }}">
      <i class="bi bi-book-fill"></i>
      Courses
    </a>
    <a href="{{ route('course_registrations.index') }}" class="nav-link {{ request()->routeIs('course_registrations.*') ? 'active' : '' }}">
      <i class="bi bi-person-plus-fill"></i>
      Course Registrations
    </a>
    <hr class="my-3">
    <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="bi bi-box-arrow-right"></i>
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </nav>
</aside>

<main>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @yield('content')
</main>

</body>
</html>
