@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('additional-css')
<style>
    /* Sidebar collapse fixes */
    .sidebar {
        overflow-y: auto;
    }

    .sidebar-header {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .sidebar-header {
        padding: 1.5rem 0.5rem;
    }

    .logo {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .logo {
        width: 45px;
        height: 45px;
        margin-bottom: 0.5rem;
    }

    .logo i {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .logo i {
        font-size: 1.4rem;
    }

    .logo-text {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .logo-text {
        opacity: 0;
        visibility: hidden;
        height: 0;
        margin: 0;
    }

    .user-profile {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .user-profile {
        padding: 0.75rem 0.5rem;
        margin: 0.5rem;
        border-radius: 15px;
    }

    /* User avatar scaling - FIXED */
    .user-avatar {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .user-avatar {
        width: 35px;
        height: 35px;
        margin-bottom: 0;
    }

    .user-avatar i {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .user-avatar i {
        font-size: 1rem;
    }

    /* User info hiding - FIXED */
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

    .nav-item {
        transition: all 0.3s ease;
    }

    .sidebar.collapsed .nav-item {
        margin: 0.5rem 0.5rem;
    }

    .nav-link {
        position: relative;
        overflow: hidden;
    }

    .sidebar.collapsed .nav-link {
        justify-content: center;
        padding: 1rem 0.5rem;
        border-radius: 12px;
    }

    .nav-link i {
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

    .sidebar.collapsed .nav-link:hover,
    .sidebar.collapsed .nav-link.active {
        transform: scale(1.05);
    }

    /* Tooltip system - FIXED */
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

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        color: white;
    }

    .stat-card:nth-child(1) .stat-icon {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .stat-card:nth-child(2) .stat-icon {
        background: linear-gradient(135deg, #2196F3, #1976D2);
    }

    .stat-card:nth-child(3) .stat-icon {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .stat-card:nth-child(4) .stat-icon {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: block;
        counter-reset: stat-counter var(--stat-value, 0);
    }

    .stat-number.animate {
        animation: countUp 2s ease-out;
    }

    @keyframes countUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .stat-label {
        color: #64748b;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .stat-trend {
        font-size: 0.8rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }

    .trend-up {
        color: #4CAF50;
    }

    .trend-down {
        color: #f44336;
    }

    /* Content Sections */
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .view-all-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .view-all-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        color: white;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: 15px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .data-table th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .data-table td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .data-table tr:hover {
        background: rgba(102, 126, 234, 0.05);
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .status-active {
        background: rgba(76, 175, 80, 0.1);
        color: #4CAF50;
    }

    .status-inactive {
        background: rgba(158, 158, 158, 0.1);
        color: #9e9e9e;
    }

    .status-admin {
        background: rgba(33, 150, 243, 0.1);
        color: #2196F3;
    }

    .status-super-admin {
        background: rgba(156, 39, 176, 0.1);
        color: #9C27B0;
    }

    .status-moderator {
        background: rgba(255, 152, 0, 0.1);
        color: #FF9800;
    }

    /* Chart Container */
    .chart-container {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 15px;
        color: #64748b;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .chart-placeholder {
        text-align: center;
        z-index: 2;
    }

    .chart-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23667eea" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        z-index: 1;
    }

    /* Quick Actions */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .quick-action-btn {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        padding: 1.5rem;
        text-decoration: none;
        color: #64748b;
        transition: all 0.3s ease;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }

    .quick-action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        color: #667eea;
    }

    .quick-action-btn i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .quick-actions {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns: 1fr;
        }
    }

    /* Loading animation */
    .loading {
        opacity: 0.7;
        pointer-events: none;
    }

    .loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin: -10px 0 0 -10px;
        border: 2px solid #f3f3f3;
        border-top: 2px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Stats Cards -->
    <div class="stats-grid animate-in">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <span class="stat-number" data-target="{{ $totalAnakKariah ?? 0 }}">{{ $totalAnakKariah ?? 0 }}</span>
            <div class="stat-label">Total Anak Kariah</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+{{ $newThisMonth ?? 0 }} this month</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <span class="stat-number" data-target="{{ $activeMembers ?? 0 }}">{{ $activeMembers ?? 0 }}</span>
            <div class="stat-label">Active Members</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+{{ $newActiveThisWeek ?? 0 }} this week</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-times"></i>
            </div>
            <span class="stat-number" data-target="{{ $inactiveMembers ?? 0 }}">{{ $inactiveMembers ?? 0 }}</span>
            <div class="stat-label">Inactive Members</div>
            <div class="stat-trend {{ ($changeInactive ?? 0) >= 0 ? 'trend-up' : 'trend-down' }}">
                <i class="fas fa-arrow-{{ ($changeInactive ?? 0) >= 0 ? 'up' : 'down' }}"></i>
                <span>{{ $changeInactive ?? 0 }} this week</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <span class="stat-number" data-target="{{ $newThisMonth ?? 0 }}">{{ $newThisMonth ?? 0 }}</span>
            <div class="stat-label">New This Month</div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+{{ $changeVsLastMonth ?? 0 }} vs last month</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="content-card animate-in">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h3>
        </div>
        <div class="quick-actions">
            <a href="{{ route('anak-kariah.list') }}" class="quick-action-btn">
                <i class="fas fa-user-plus"></i>
                <span>Add New Member</span>
            </a>
            <a href="{{ route('anak-kariah.statistics') }}" class="quick-action-btn">
                <i class="fas fa-chart-line"></i>
                <span>View Reports</span>
            </a>
            <a href="{{ route('admin.carousel.images') }}" class="quick-action-btn">
                <i class="fas fa-calendar-plus"></i>
                <span>Manage Events</span>
            </a>
            <a href="{{ route('admin.list') }}" class="quick-action-btn">
                <i class="fas fa-users-cog"></i>
                <span>Admin Settings</span>
            </a>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid animate-in">
        <!-- Recent Anak Kariah Table -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-clock"></i>
                    Recent Anak Kariah Data
                </h3>
                <a href="{{ route('anak-kariah.list') }}" class="view-all-btn">
                    <span>View All</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>IC Number</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anakKariahs ?? [] as $data)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                                        <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.8rem;">
                                            {{ substr($data->full_name ?? 'U', 0, 1) }}
                                        </div>
                                        <strong>{{ $data->full_name ?? 'Unknown' }}</strong>
                                    </div>
                                </td>
                                <td>{{ $data->ic_number ?? 'N/A' }}</td>
                                <td>
                                    <span style="background: rgba(102, 126, 234, 0.1); color: #667eea; padding: 0.2rem 0.5rem; border-radius: 8px; font-size: 0.8rem;">
                                        {{ $data->areas ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $status = $data->status ?? 'inactive';
                                        $isActive = strtolower($status) === 'active';
                                    @endphp
                                    <span class="status-badge {{ $isActive ? 'status-active' : 'status-inactive' }}">
                                        <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td>{{ $data->created_at ? $data->created_at->format('d M Y') : 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 2rem; color: #9e9e9e;">
                                    <i class="fas fa-users" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    No recent data available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Statistics Chart -->
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Statistics by Area
                </h3>
                <a href="{{ route('anak-kariah.statistics') }}" class="view-all-btn">
                    <span>View Details</span>
                    <i class="fas fa-chart-line"></i>
                </a>
            </div>
            <div class="chart-container">
                @if(isset($chartComponent) && $chartComponent)
                    <livewire:anak-kariah-chart />
                @else
                    <div class="chart-placeholder">
                        <i class="fas fa-chart-pie" style="font-size: 3rem; margin-bottom: 1rem; color: #667eea;"></i>
                        <div>Statistics Chart</div>
                        <div style="font-size: 0.8rem; margin-top: 0.5rem; opacity: 0.7;">
                            Interactive area-wise distribution
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


</div>
@endsection

@section('additional-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stat numbers on load
        const statNumbers = document.querySelectorAll('.stat-number[data-target]');
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-target'));
            if (target > 0) {
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current);
                }, 16);
            }
        });

        // Add hover effects to table rows
        const tableRows = document.querySelectorAll('.data-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Auto-refresh data every 5 minutes (optional)
        setInterval(() => {
            // You can add AJAX calls here to refresh dashboard data
            console.log('Dashboard data refresh check...');
        }, 300000);
    });
</script>
@endsection