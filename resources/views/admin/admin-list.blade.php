@extends('layouts.admin')

@section('title', 'Admin Management')
@section('page-title', 'Admin Management')

@section('additional-css')
<style>
    /* Page Header */
    .page-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin: 0;
    }

    /* Stats Cards for Admin Overview */
    .admin-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .admin-stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .admin-stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .admin-stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }

    .admin-stat-card:nth-child(1) .admin-stat-icon {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .admin-stat-card:nth-child(2) .admin-stat-icon {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .admin-stat-card:nth-child(3) .admin-stat-icon {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .admin-stat-card:nth-child(4) .admin-stat-icon {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    .admin-stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.3rem;
    }

    .admin-stat-label {
        color: #64748b;
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Action Bar */
    .action-bar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        flex-wrap: wrap;
        gap: 1rem;
    }

    .search-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
        min-width: 250px;
    }

    .search-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .add-admin-btn {
        background: linear-gradient(135deg, #4CAF50, #45a049);
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

    .add-admin-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        color: white;
    }

    /* Main Table Container */
    .table-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .table-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Enhanced Table Styles */
    .admin-table-wrapper {
        overflow-x: auto;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        margin: 0;
    }

    .admin-table thead th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1.2rem 1rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        position: relative;
    }

    .admin-table thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .admin-table thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .admin-table tbody td {
        padding: 1.2rem 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .admin-table tbody tr {
        transition: all 0.3s ease;
        background: white;
    }

    .admin-table tbody tr:nth-child(even) {
        background: rgba(102, 126, 234, 0.02);
    }

    .admin-table tbody tr:hover {
        background: rgba(102, 126, 234, 0.08);
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .admin-table tbody tr:last-child td:first-child {
        border-radius: 0 0 0 15px;
    }

    .admin-table tbody tr:last-child td:last-child {
        border-radius: 0 0 15px 0;
    }

    .admin-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Admin Profile Cell */
    .admin-profile {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .admin-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .admin-info {
        flex: 1;
    }

    .admin-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.2rem;
        font-size: 1rem;
    }

    .admin-email {
        color: #64748b;
        font-size: 0.85rem;
    }

    /* Role Badges */
    .role-badge {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        text-transform: capitalize;
    }

    .role-super-admin {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
        color: white;
    }

    .role-admin {
        background: linear-gradient(135deg, #2196F3, #1976D2);
        color: white;
    }

    .role-moderator {
        background: linear-gradient(135deg, #FF9800, #F57C00);
        color: white;
    }

    /* Date Styling */
    .date-cell {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .date-primary {
        font-weight: 600;
        color: #2c3e50;
    }

    .date-secondary {
        font-size: 0.8rem;
        color: #64748b;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #e2e8f0;
    }

    .empty-state h3 {
        margin-bottom: 0.5rem;
        color: #2c3e50;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .admin-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .action-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-container {
            min-width: auto;
        }

        .page-title {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .admin-table thead th,
        .admin-table tbody td {
            padding: 0.8rem 0.5rem;
            font-size: 0.8rem;
        }

        .admin-profile {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .admin-stats {
            grid-template-columns: 1fr;
        }

        .table-container {
            padding: 1rem;
        }

        .admin-avatar {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
    }

    /* Animation */
    .animate-in {
        animation: fadeInUp 0.6s ease-out;
    }

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
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header animate-in">
        <h1 class="page-title">
            <i class="fas fa-users-cog"></i>
            Admin Management
        </h1>
        <p class="page-subtitle">Manage system administrators and their permissions</p>
    </div>

    <!-- Admin Statistics -->
    <div class="admin-stats animate-in">
        <div class="admin-stat-card">
            <div class="admin-stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="admin-stat-number">{{ $admins->count() }}</div>
            <div class="admin-stat-label">Total Admins</div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-icon">
                <i class="fas fa-crown"></i>
            </div>
            <div class="admin-stat-number">{{ $admins->where('role', 'super_admin')->count() }}</div>
            <div class="admin-stat-label">Super Admins</div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="admin-stat-number">{{ $admins->where('role', 'admin')->count() }}</div>
            <div class="admin-stat-label">Regular Admins</div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="admin-stat-number">{{ $admins->whereNotIn('role', ['super_admin', 'admin'])->count() }}</div>
            <div class="admin-stat-label">Moderators</div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar animate-in">
        <div class="search-container">
            <i class="fas fa-search" style="color: #64748b;"></i>
            <input type="text" class="search-input" placeholder="Search admins by name or email..." id="adminSearch">
        </div>
        <a href="#" class="add-admin-btn">
            <i class="fas fa-plus"></i>
            <span>Add New Admin</span>
        </a>
    </div>

    <!-- Main Table -->
    <div class="table-container animate-in">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-list"></i>
                Registered Administrators
            </h3>
            <div style="color: #64748b; font-size: 0.9rem;">
                {{ $admins->count() }} {{ Str::plural('admin', $admins->count()) }} found
            </div>
        </div>

        @if($admins->count() > 0)
            <div class="admin-table-wrapper">
                <table class="admin-table" id="adminTable">
                    <thead>
                        <tr>
                            <th>
                                <i class="fas fa-hashtag" style="margin-right: 0.5rem;"></i>
                                ID
                            </th>
                            <th>
                                <i class="fas fa-user" style="margin-right: 0.5rem;"></i>
                                Administrator
                            </th>
                            <th>
                                <i class="fas fa-user-tag" style="margin-right: 0.5rem;"></i>
                                Role
                            </th>
                            <th>
                                <i class="fas fa-calendar-plus" style="margin-right: 0.5rem;"></i>
                                Registered
                            </th>
                            <th>
                                <i class="fas fa-clock" style="margin-right: 0.5rem;"></i>
                                Last Login
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr class="admin-row" data-search="{{ strtolower($admin->name . ' ' . $admin->email . ' ' . $admin->role) }}">
                                <td>
                                    <strong style="color: #667eea;">#{{ $admin->id }}</strong>
                                </td>
                                <td>
                                    <div class="admin-profile">
                                        <div class="admin-avatar" style="background: linear-gradient(135deg, {{ ['#667eea', '#4CAF50', '#FF9800', '#9C27B0', '#f44336'][$admin->id % 5] }}, {{ ['#764ba2', '#45a049', '#F57C00', '#7B1FA2', '#d32f2f'][$admin->id % 5] }});">
                                            {{ strtoupper(substr($admin->name, 0, 1)) }}
                                        </div>
                                        <div class="admin-info">
                                            <div class="admin-name">{{ $admin->name }}</div>
                                            <div class="admin-email">{{ $admin->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($admin->role == 'super_admin')
                                        <span class="role-badge role-super-admin">
                                            <i class="fas fa-crown"></i>
                                            Super Admin
                                        </span>
                                    @elseif($admin->role == 'admin')
                                        <span class="role-badge role-admin">
                                            <i class="fas fa-user-shield"></i>
                                            Admin
                                        </span>
                                    @else
                                        <span class="role-badge role-moderator">
                                            <i class="fas fa-user-tie"></i>
                                            {{ ucfirst($admin->role) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <div class="date-primary">{{ $admin->created_at->format('d M Y') }}</div>
                                        <div class="date-secondary">{{ $admin->created_at->format('H:i') }}</div>
                                    </div>
                                </td>
                                <td>
                                    @if(isset($admin->last_login_at) && $admin->last_login_at)
                                        <div class="date-cell">
                                            <div class="date-primary">{{ $admin->last_login_at->diffForHumans() }}</div>
                                            <div class="date-secondary">{{ $admin->last_login_at->format('d M Y, H:i') }}</div>
                                        </div>
                                    @else
                                        <span style="color: #9e9e9e; font-style: italic;">
                                            <i class="fas fa-minus-circle" style="margin-right: 0.3rem;"></i>
                                            Never logged in
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-users-slash"></i>
                <h3>No Administrators Found</h3>
                <p>There are currently no administrators in the system.</p>
                <a href="#" class="add-admin-btn" style="margin-top: 1rem; display: inline-flex;">
                    <i class="fas fa-plus"></i>
                    <span>Add First Admin</span>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('additional-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('adminSearch');
        const adminRows = document.querySelectorAll('.admin-row');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            adminRows.forEach(row => {
                const searchData = row.getAttribute('data-search');
                if (searchData.includes(searchTerm)) {
                    row.style.display = '';
                    row.style.opacity = '1';
                } else {
                    row.style.display = 'none';
                    row.style.opacity = '0';
                }
            });

            // Update count
            const visibleRows = Array.from(adminRows).filter(row => row.style.display !== 'none');
            const countElement = document.querySelector('.table-header div');
            if (countElement) {
                countElement.textContent = `${visibleRows.length} ${visibleRows.length === 1 ? 'admin' : 'admins'} found`;
            }
        });

        // Add animation delays
        const animateElements = document.querySelectorAll('.animate-in');
        animateElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
        });

        // Table row hover enhancement
        const tableRows = document.querySelectorAll('.admin-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(8px)';
                this.style.boxShadow = '0 8px 25px rgba(102, 126, 234, 0.15)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
                this.style.boxShadow = '';
            });
        });

        // Animate statistics on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numbers = entry.target.querySelectorAll('.admin-stat-number');
                    numbers.forEach(number => {
                        const target = parseInt(number.textContent);
                        animateNumber(number, 0, target, 1000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsContainer = document.querySelector('.admin-stats');
        if (statsContainer) {
            observer.observe(statsContainer);
        }

        // Number animation function
        function animateNumber(element, start, end, duration) {
            const range = end - start;
            const increment = range / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= end) {
                    current = end;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        }
    });
</script>
@endsection