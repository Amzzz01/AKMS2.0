@extends('layouts.admin')

@section('title', 'Anak Kariah Management')
@section('page-title', 'Anak Kariah Management')

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

    /* Stats Cards */
    .stats-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
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
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.3rem;
    }

    .stat-label {
        color: #64748b;
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Search and Filter Bar */
    .filter-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .filter-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .filter-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .search-container {
        display: flex;
        gap: 1rem;
        align-items: end;
        flex-wrap: wrap;
    }

    .search-group {
        flex: 1;
        min-width: 250px;
    }

    .search-label {
        display: block;
        font-weight: 500;
        color: #64748b;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .search-input {
        width: 100%;
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

    .btn-search {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        height: fit-content;
    }

    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        color: white;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .btn-add {
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

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        color: white;
    }

    .btn-export {
        background: linear-gradient(135deg, #FF9800, #F57C00);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-export:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
        color: white;
    }

    .btn-view-toggle {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        border: 2px solid rgba(102, 126, 234, 0.2);
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-view-toggle:hover {
        background: rgba(102, 126, 234, 0.2);
        color: #667eea;
    }

    /* Table Container */
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

    .table-count {
        color: #64748b;
        font-size: 0.9rem;
        background: rgba(102, 126, 234, 0.1);
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
    }

    /* Enhanced Table */
    .data-table-wrapper {
        overflow-x: auto;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        margin: 0;
    }

    .data-table thead th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1rem 0.75rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        position: relative;
    }

    .data-table thead th:first-child {
        border-radius: 15px 0 0 0;
    }

    .data-table thead th:last-child {
        border-radius: 0 15px 0 0;
    }

    .sort-links {
        margin-left: 0.5rem;
    }

    .sort-links a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        margin: 0 2px;
        font-size: 0.8rem;
    }

    .sort-links a:hover {
        color: white;
    }

    .data-table tbody td {
        padding: 1rem 0.75rem;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
        background: white;
    }

    .data-table tbody tr:nth-child(even) {
        background: rgba(102, 126, 234, 0.02);
    }

    .data-table tbody tr:hover {
        background: rgba(102, 126, 234, 0.08);
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .data-table tbody tr:last-child td:first-child {
        border-radius: 0 0 0 15px;
    }

    .data-table tbody tr:last-child td:last-child {
        border-radius: 0 0 15px 0;
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Member Profile Cell */
    .member-profile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .member-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        flex-shrink: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .member-info {
        flex: 1;
    }

    .member-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.2rem;
    }

    .member-ic {
        color: #64748b;
        font-size: 0.8rem;
    }

    /* Status Badges */
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

    /* Action Buttons in Table */
    .table-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-table-action {
        padding: 0.4rem 0.8rem;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background: linear-gradient(135deg, #FF9800, #F57C00);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(255, 152, 0, 0.3);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #f44336, #d32f2f);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(244, 67, 54, 0.3);
        color: white;
    }

    .btn-toggle {
        background: linear-gradient(135deg, #9e9e9e, #757575);
        color: white;
    }

    .btn-toggle.active {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .btn-toggle:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(158, 158, 158, 0.3);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
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

    /* Pagination */
    .pagination-container {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    /* Loading State */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        z-index: 10;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .search-container {
            flex-direction: column;
        }

        .search-group {
            min-width: auto;
        }

        .action-buttons {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .stats-overview {
            grid-template-columns: repeat(2, 1fr);
        }

        .page-title {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .data-table thead th,
        .data-table tbody td {
            padding: 0.5rem 0.4rem;
            font-size: 0.8rem;
        }

        .member-profile {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }

        .table-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .stats-overview {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
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
            <i class="fas fa-users"></i>
            Anak Kariah Management
        </h1>
        <p class="page-subtitle">Manage and monitor all Anak Kariah members in the system</p>
    </div>

    <!-- Statistics Overview -->
    <div class="stats-overview animate-in">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">{{ $anakKariahList->total() ?? $anakKariahList->count() }}</div>
            <div class="stat-label">Total Members</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-number">{{ $anakKariahList->where('status', 'active')->count() }}</div>
            <div class="stat-label">Active Members</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="stat-number">{{ $anakKariahList->where('status', 'inactive')->count() }}</div>
            <div class="stat-label">Inactive Members</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-number">{{ $anakKariahList->pluck('areas')->unique()->count() }}</div>
            <div class="stat-label">Areas Covered</div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="filter-section animate-in">
        <div class="filter-header">
            <h3 class="filter-title">
                <i class="fas fa-search"></i>
                Search & Filter
            </h3>
        </div>
        
        <form action="{{ route('anak-kariah.list') }}" method="GET">
            <div class="search-container">
                <div class="search-group">
                    <label class="search-label">Search Members</label>
                    <input type="text" name="search" class="search-input" 
                           placeholder="Search by name, IC number, phone..." 
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i>
                    Search
                </button>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('anak-kariah.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Add New Member
                </a>
                
                <button type="button" class="btn-export" onclick="exportTableToCSV()">
                    <i class="fas fa-download"></i>
                    Export to CSV
                </button>
                
                @if(request('view') === 'all')
                    <a href="{{ route('anak-kariah.list') }}" class="btn-view-toggle">
                        <i class="fas fa-list"></i>
                        Paginated View
                    </a>
                @else
                    <a href="{{ route('anak-kariah.list', ['view' => 'all']) }}" class="btn-view-toggle">
                        <i class="fas fa-eye"></i>
                        View Full List
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <div class="table-container animate-in">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-table"></i>
                Members List
            </h3>
            <div class="table-count">
                {{ $anakKariahList instanceof \Illuminate\Pagination\AbstractPaginator ? $anakKariahList->total() : $anakKariahList->count() }} 
                {{ Str::plural('member', $anakKariahList instanceof \Illuminate\Pagination\AbstractPaginator ? $anakKariahList->total() : $anakKariahList->count()) }}
            </div>
        </div>

        @if($anakKariahList->count() > 0)
            <div class="data-table-wrapper">
                <table class="data-table" id="membersTable">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>
                                Member
                                <span class="sort-links">
                                    <a href="?sort=full_name&direction=asc&{{ http_build_query(request()->except(['sort', 'direction'])) }}">▲</a>
                                    <a href="?sort=full_name&direction=desc&{{ http_build_query(request()->except(['sort', 'direction'])) }}">▼</a>
                                </span>
                            </th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anakKariahList as $data)
                            <tr>
                                <td class="text-center">
                                    <strong style="color: #667eea;">
                                        {{ $anakKariahList instanceof \Illuminate\Pagination\AbstractPaginator ? (($anakKariahList->currentPage() - 1) * $anakKariahList->perPage() + $loop->iteration) : $loop->iteration }}
                                    </strong>
                                </td>
                                <td>
                                    <div class="member-profile">
                                        <div class="member-avatar">
                                            {{ strtoupper(substr($data->full_name, 0, 1)) }}
                                        </div>
                                        <div class="member-info">
                                            <div class="member-name">{{ $data->full_name }}</div>
                                            <div class="member-ic">{{ $data->ic_number }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: #2c3e50;">{{ $data->phone_number }}</div>
                                </td>
                                <td>
                                    <span style="padding: 0.2rem 0.6rem; background: rgba(102, 126, 234, 0.1); color: #667eea; border-radius: 12px; font-size: 0.8rem;">
                                        {{ ucfirst($data->gender) }}
                                    </span>
                                </td>
                                <td>{{ $data->date_of_birth ? \Carbon\Carbon::parse($data->date_of_birth)->format('d M Y') : 'N/A' }}</td>
                                <td>
                                    <strong style="color: #2c3e50;">
                                        {{ $data->date_of_birth ? \Carbon\Carbon::parse($data->date_of_birth)->age . ' years' : 'N/A' }}
                                    </strong>
                                </td>
                                <td style="max-width: 150px; word-wrap: break-word;">{{ $data->address }}</td>
                                <td>
                                    <span style="padding: 0.2rem 0.6rem; background: rgba(255, 152, 0, 0.1); color: #FF9800; border-radius: 12px; font-size: 0.8rem;">
                                        {{ $data->areas }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $data->status == 'active' ? 'status-active' : 'status-inactive' }}">
                                        <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                        {{ ucfirst($data->status ?? 'active') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('anak-kariah.edit', $data->id) }}" 
                                           class="btn-table-action btn-edit" 
                                           title="Edit Member">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <form action="{{ route('anak-kariah.destroy', $data->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn-table-action btn-delete" 
                                                    onclick="return confirm('Are you sure you want to delete this member?')"
                                                    title="Delete Member">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        
                                        @if(Route::has('anak-kariah.toggleStatus'))
                                            <form action="{{ route('anak-kariah.toggleStatus', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" 
                                                        class="btn-table-action btn-toggle {{ $data->status == 'active' ? '' : 'active' }}"
                                                        onclick="return confirm('Are you sure you want to {{ $data->status == 'active' ? 'deactivate' : 'reactivate' }} this member?')"
                                                        title="{{ $data->status == 'active' ? 'Deactivate' : 'Activate' }} Member">
                                                    <i class="fas fa-{{ $data->status == 'active' ? 'times' : 'check' }}"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-users-slash"></i>
                <h3>No Members Found</h3>
                <p>{{ request('search') ? 'No members match your search criteria.' : 'No members have been added yet.' }}</p>
                @if(request('search'))
                    <a href="{{ route('anak-kariah.list') }}" class="btn-add" style="margin-top: 1rem;">
                        <i class="fas fa-arrow-left"></i>
                        Show All Members
                    </a>
                @else
                    <a href="{{ route('anak-kariah.create') }}" class="btn-add" style="margin-top: 1rem;">
                        <i class="fas fa-plus"></i>
                        Add First Member
                    </a>
                @endif
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($anakKariahList instanceof \Illuminate\Pagination\AbstractPaginator && $anakKariahList->hasPages())
        <div class="pagination-container animate-in">
            {{ $anakKariahList->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

@section('additional-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate statistics on page load
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach((stat, index) => {
            const target = parseInt(stat.textContent);
            animateNumber(stat, 0, target, 1500 + (index * 200));
        });

        // Add animation delays
        const animateElements = document.querySelectorAll('.animate-in');
        animateElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
        });

        // Table row hover enhancement
        const tableRows = document.querySelectorAll('.data-table tbody tr');
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

        // Search input enhancement
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    this.closest('form').submit();
                }
            });

            // Auto-focus search input if there's a search query
            if (searchInput.value) {
                searchInput.focus();
                searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
            }
        }

        // Tooltip initialization for action buttons
        const tooltipElements = document.querySelectorAll('[title]');
        tooltipElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                const tooltip = document.createElement('div');
                tooltip.textContent = this.getAttribute('title');
                tooltip.style.cssText = `
                    position: absolute;
                    background: rgba(0, 0, 0, 0.8);
                    color: white;
                    padding: 0.5rem;
                    border-radius: 4px;
                    font-size: 0.8rem;
                    z-index: 1000;
                    pointer-events: none;
                    transform: translateX(-50%);
                `;
                tooltip.className = 'custom-tooltip';
                
                document.body.appendChild(tooltip);
                
                const rect = this.getBoundingClientRect();
                tooltip.style.left = (rect.left + rect.width / 2) + 'px';
                tooltip.style.top = (rect.top - tooltip.offsetHeight - 5) + 'px';
            });
            
            element.addEventListener('mouseleave', function() {
                const tooltip = document.querySelector('.custom-tooltip');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    });

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

    // Enhanced CSV export function
    function exportTableToCSV() {
        const table = document.getElementById('membersTable');
        if (!table) {
            alert('Table not found!');
            return;
        }

        // Show loading state
        const exportBtn = document.querySelector('.btn-export');
        const originalText = exportBtn.innerHTML;
        exportBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Exporting...';
        exportBtn.disabled = true;

        // Create CSV content
        const rows = [];
        
        // Add headers
        const headerCells = table.querySelectorAll('thead th');
        const headers = Array.from(headerCells).map(cell => {
            // Clean up header text, remove sort arrows
            return cell.textContent.replace(/[▲▼]/g, '').trim();
        }).filter(header => header !== 'Actions'); // Exclude Actions column
        rows.push(headers);

        // Add data rows
        const dataRows = table.querySelectorAll('tbody tr');
        dataRows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowData = [];
            
            // Process each cell, excluding the actions column
            for (let i = 0; i < cells.length - 1; i++) {
                const cell = cells[i];
                let cellText = '';
                
                // Special handling for different cell types
                if (cell.querySelector('.member-name')) {
                    cellText = cell.querySelector('.member-name').textContent.trim();
                } else if (cell.querySelector('.member-ic')) {
                    cellText = cell.querySelector('.member-ic').textContent.trim();
                } else if (cell.querySelector('.status-badge')) {
                    cellText = cell.querySelector('.status-badge').textContent.trim();
                } else {
                    cellText = cell.textContent.trim();
                }
                
                // Clean up text and escape quotes
                cellText = cellText.replace(/"/g, '""');
                rowData.push(`"${cellText}"`);
            }
            rows.push(rowData);
        });

        // Create CSV string
        const csvContent = rows.map(row => row.join(',')).join('\n');

        // Create and trigger download
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        
        if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', `anak_kariah_list_${new Date().toISOString().split('T')[0]}.csv`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Reset button state
        setTimeout(() => {
            exportBtn.innerHTML = originalText;
            exportBtn.disabled = false;
        }, 1000);
    }

    // Enhanced delete confirmation
    function confirmDelete(memberName) {
        return confirm(`Are you sure you want to delete ${memberName}?\n\nThis action cannot be undone.`);
    }

    // Enhanced status toggle confirmation
    function confirmStatusToggle(memberName, currentStatus) {
        const action = currentStatus === 'active' ? 'deactivate' : 'activate';
        return confirm(`Are you sure you want to ${action} ${memberName}?`);
    }

    // Auto-refresh functionality (optional)
    let autoRefreshInterval;
    
    function startAutoRefresh() {
        autoRefreshInterval = setInterval(() => {
            // Only refresh if no forms are being submitted and no modals are open
            if (!document.querySelector('.loading-overlay')) {
                console.log('Auto-refreshing member data...');
                // You can implement AJAX refresh here
            }
        }, 300000); // 5 minutes
    }

    function stopAutoRefresh() {
        if (autoRefreshInterval) {
            clearInterval(autoRefreshInterval);
        }
    }

    // Start auto-refresh when page loads
    // startAutoRefresh();

    // Stop auto-refresh when page is hidden
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopAutoRefresh();
        } else {
            // startAutoRefresh();
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K to focus search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.focus();
                searchInput.select();
            }
        }
        
        // Ctrl/Cmd + E to export
        if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
            e.preventDefault();
            exportTableToCSV();
        }
        
        // Ctrl/Cmd + N to add new member
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            const addButton = document.querySelector('.btn-add');
            if (addButton) {
                window.location.href = addButton.href;
            }
        }
    });

    // Show keyboard shortcuts help
    function showKeyboardShortcuts() {
        alert(`Keyboard Shortcuts:
        
Ctrl/Cmd + K: Focus search
Ctrl/Cmd + E: Export to CSV
Ctrl/Cmd + N: Add new member
        
Tip: You can also press Enter in the search box to search!`);
    }

    // Add keyboard shortcuts help button (optional)
    // You can add this button to your interface if needed
</script>
@endsection