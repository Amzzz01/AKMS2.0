<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AKMS Dashboard') - Masjid Al-Irsyad</title>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Fonts and Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .sidebar-header {
            padding: 1.5rem 0.5rem;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo {
            width: 45px;
            height: 45px;
            margin-bottom: 0.5rem;
        }

        .logo i {
            color: white;
            font-size: 1.8rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo i {
            font-size: 1.4rem;
        }

        .logo-text {
            font-weight: 700;
            color: #2c3e50;
            font-size: 1.1rem;
            line-height: 1.2;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo-text {
            opacity: 0;
            visibility: hidden;
            height: 0;
            margin: 0;
        }

        .user-profile {
            padding: 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 1rem;
            border-radius: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-profile {
            padding: 0.75rem 0.5rem;
            margin: 0.5rem;
            border-radius: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-avatar {
            width: 35px;
            height: 35px;
            margin-bottom: 0;
        }

        .user-avatar i {
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-avatar i {
            font-size: 1rem;
        }

        .user-info {
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .user-info {
            opacity: 0;
            visibility: hidden;
            height: 0;
            overflow: hidden;
        }

        .user-name {
            font-weight: 600;
            margin-bottom: 0.2rem;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            opacity: 0.9;
        }

        .nav-menu {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .nav-item {
            margin: 0.5rem 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 1rem 0.5rem;
            border-radius: 12px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .sidebar.collapsed .nav-link:hover,
        .sidebar.collapsed .nav-link.active {
            transform: scale(1.05);
        }

        .nav-link i {
            width: 20px;
            margin-right: 1rem;
            font-size: 1.1rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            font-size: 1rem;
        }

        .nav-link span {
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .sidebar.collapsed .nav-link span {
            opacity: 0;
            visibility: hidden;
            width: 0;
            overflow: hidden;
        }

        /* Tooltip for collapsed sidebar */
        .sidebar.collapsed .nav-link {
            position: relative;
        }

        .sidebar.collapsed .nav-link::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            margin-left: 10px;
            z-index: 1001;
        }

        .sidebar.collapsed .nav-link:hover::after {
            opacity: 1;
            visibility: visible;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: all 0.3s ease;
            padding: 2rem;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .toggle-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .toggle-btn:hover {
            transform: scale(1.05);
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background: rgba(102, 126, 234, 0.2);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
        }

        .logout-btn {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: rgba(255, 71, 87, 0.2);
            color: #ff4757;
        }

        /* Content Card Base */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            .header-title {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 1rem;
            }
        }

        /* Animation for loading */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Additional utility classes */
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .alert-danger {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            border: 1px solid rgba(255, 71, 87, 0.2);
        }

        .alert-warning {
            background: rgba(255, 152, 0, 0.1);
            color: #FF9800;
            border: 1px solid rgba(255, 152, 0, 0.2);
        }

        .alert-info {
            background: rgba(33, 150, 243, 0.1);
            color: #2196F3;
            border: 1px solid rgba(33, 150, 243, 0.2);
        }
    </style>
    
    @yield('additional-css')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-mosque"></i>
            </div>
            <div class="logo-text">
                <div>AKMS</div>
                <div style="font-size: 0.8rem; font-weight: 400;">Masjid Al-Irsyad</div>
            </div>
        </div>

        <div class="user-profile">
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">{{ ucfirst(auth()->user()->role) }}</div>
            </div>
        </div>

        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-tooltip="Dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('anak-kariah.list') }}" class="nav-link {{ request()->routeIs('anak-kariah.*') ? 'active' : '' }}" data-tooltip="Anak Kariah Management">
                    <i class="fas fa-users"></i>
                    <span>Anak Kariah Management</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('#') }}" class="nav-link {{ request()->routeIs('*.statistics') ? 'active' : '' }}" data-tooltip="Reports & Analytics">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports & Analytics</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.carousel.images') }}" class="nav-link {{ request()->routeIs('admin.carousel.*') ? 'active' : '' }}" data-tooltip="Event Management">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Event Management</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link" data-tooltip="Notifications">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.list') }}" class="nav-link {{ request()->routeIs('admin.list') ? 'active' : '' }}" data-tooltip="Admin Management">
                    <i class="fas fa-user-shield"></i>
                    <span>Admin Management</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link" data-tooltip="Settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" data-tooltip="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="header animate-in">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-btn" id="toggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="header-title">@yield('page-title', 'Admin Dashboard')</h1>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success animate-in">
                <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger animate-in">
                <i class="fas fa-exclamation-circle" style="margin-right: 0.5rem;"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning animate-in">
                <i class="fas fa-exclamation-triangle" style="margin-right: 0.5rem;"></i>
                {{ session('warning') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info animate-in">
                <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i>
                {{ session('info') }}
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- Hidden logout form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Scripts -->
    <script>
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleBtn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Mobile sidebar toggle
        if (window.innerWidth <= 768) {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
            
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }

        // Add animation delay to cards
        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('.animate-in');
            animateElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Auto-hide alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });

        // Handle responsive sidebar
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('open');
            }
        });
    </script>

    @yield('additional-js')
    
    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>