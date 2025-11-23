<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - AKMS 2.0')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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

        /* ==================================
           MOBILE-FIRST BASE STYLES
           ================================== */

        /* Sidebar - Mobile First (hidden by default on mobile) */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 280px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, width 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            transform: translateX(-100%); /* Hidden on mobile by default */
        }

        .sidebar.open {
            transform: translateX(0); /* Show on mobile when toggled */
        }

        /* Sidebar Header */
        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        /* User Profile */
        .user-profile {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 2px;
        }

        /* Navigation Menu */
        .nav-menu {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.5rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .nav-link i {
            width: 20px;
            margin-right: 1rem;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Main Content - Mobile First */
        .main-content {
            margin-left: 0; /* No left margin on mobile */
            min-height: 100vh;
            padding: 1rem; /* Smaller padding on mobile */
            transition: margin-left 0.3s ease;
        }

        /* Mobile Overlay for Sidebar */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex: 1;
            min-width: 0;
        }

        .toggle-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
        }

        .toggle-btn:hover {
            transform: scale(1.05);
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c3e50;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .header-actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-shrink: 0;
        }

        .notification-btn {
            position: relative;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
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
            font-size: 0.65rem;
            padding: 2px 5px;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
        }

        .logout-btn {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
            border: none;
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background: rgba(255, 71, 87, 0.2);
        }

        .logout-btn span {
            display: none; /* Hide text on mobile */
        }

        /* Content Card */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 1.5rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 500;
            font-size: 0.9rem;
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

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* ==================================
           TABLET STYLES (min-width: 768px)
           ================================== */
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0); /* Always visible on tablet+ */
            }

            .main-content {
                margin-left: 280px; /* Add left margin for sidebar */
                padding: 1.5rem;
            }

            .sidebar-overlay {
                display: none !important; /* No overlay needed on tablet+ */
            }

            .header {
                padding: 1.25rem 1.5rem;
                border-radius: 18px;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .toggle-btn {
                width: 42px;
                height: 42px;
            }

            .notification-btn {
                width: 42px;
                height: 42px;
            }

            .logout-btn {
                padding: 0.6rem 1rem;
            }

            .logout-btn span {
                display: inline; /* Show text on tablet+ */
            }

            .content-card {
                padding: 1.75rem;
                border-radius: 18px;
            }

            /* Collapsed sidebar for tablet */
            .sidebar.collapsed {
                width: 80px;
            }

            .sidebar.collapsed .logo-text,
            .sidebar.collapsed .user-info,
            .sidebar.collapsed .nav-link span {
                opacity: 0;
                visibility: hidden;
                width: 0;
                overflow: hidden;
            }

            .sidebar.collapsed .nav-link {
                justify-content: center;
                padding: 1rem;
            }

            .sidebar.collapsed .nav-link i {
                margin-right: 0;
            }

            .main-content.expanded {
                margin-left: 80px;
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
                pointer-events: none;
            }

            .sidebar.collapsed .nav-link:hover::after {
                opacity: 1;
                visibility: visible;
            }
        }

        /* ==================================
           DESKTOP STYLES (min-width: 1024px)
           ================================== */
        @media (min-width: 1024px) {
            .main-content {
                padding: 2rem;
            }

            .header {
                padding: 1.5rem 2rem;
                border-radius: 20px;
            }

            .header-title {
                font-size: 1.8rem;
            }

            .toggle-btn {
                width: 45px;
                height: 45px;
                border-radius: 12px;
            }

            .notification-btn {
                width: 45px;
                height: 45px;
                border-radius: 12px;
            }

            .logout-btn {
                padding: 0.65rem 1.25rem;
                border-radius: 12px;
            }

            .content-card {
                padding: 2rem;
                border-radius: 20px;
            }

            .alert {
                padding: 1rem 1.5rem;
            }

            .btn-primary {
                padding: 0.85rem 1.5rem;
            }
        }

        /* ==================================
           LARGE DESKTOP (min-width: 1200px)
           ================================== */
        @media (min-width: 1200px) {
            .header-actions {
                gap: 1rem;
            }

            .header-left {
                gap: 1rem;
            }
        }
    </style>
    
    @yield('additional-css')
</head>
<body>
    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

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
                <div class="user-role">{{ ucfirst(auth()->user()->role ?? 'Admin') }}</div>
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
                    <span>Anak Kariah</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('anak-kariah.statistics') }}" class="nav-link {{ request()->routeIs('*.statistics') ? 'active' : '' }}" data-tooltip="Reports & Analytics">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.carousel.images') }}" class="nav-link {{ request()->routeIs('admin.carousel.*') ? 'active' : '' }}" data-tooltip="Event Management">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Events</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.kariah-map.index') }}" class="nav-link {{ request()->routeIs('admin.kariah-map.*') ? 'active' : '' }}" data-tooltip="Kariah Map">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Kariah Map</span>
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
                    <span>Admins</span>
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
            <div class="header-left">
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
        // Mobile-first sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleBtn');
        const overlay = document.getElementById('sidebarOverlay');

        function isMobile() {
            return window.innerWidth < 768;
        }

        // Toggle sidebar
        toggleBtn.addEventListener('click', function() {
            if (isMobile()) {
                // Mobile: toggle sidebar and overlay
                sidebar.classList.toggle('open');
                overlay.classList.toggle('active');
            } else {
                // Tablet/Desktop: collapse sidebar
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        });

        // Close sidebar when clicking overlay (mobile only)
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (!isMobile()) {
                    // Remove mobile classes when switching to tablet/desktop
                    overlay.classList.remove('active');
                    // Keep collapsed state on desktop if it was collapsed
                } else {
                    // Remove desktop collapsed classes when switching to mobile
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    // Close sidebar on mobile
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            }, 250);
        });

        // Close mobile sidebar when clicking nav links
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (isMobile()) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            });
        });

        // Auto-dismiss alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });
    </script>

    @yield('additional-js')
</body>
</html>