@extends('layouts.admin')

@section('title', 'Reports & Analytics')
@section('page-title', 'Reports & Analytics')

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

    /* Key Metrics Grid */
    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .metric-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 20px 20px 0 0;
    }

    .metric-card:nth-child(1)::before {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .metric-card:nth-child(2)::before {
        background: linear-gradient(135deg, #2196F3, #1976D2);
    }

    .metric-card:nth-child(3)::before {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .metric-card:nth-child(4)::before {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    .metric-card:nth-child(5)::before {
        background: linear-gradient(135deg, #f44336, #d32f2f);
    }

    .metric-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
    }

    .metric-card:nth-child(1) .metric-icon {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .metric-card:nth-child(2) .metric-icon {
        background: linear-gradient(135deg, #2196F3, #1976D2);
    }

    .metric-card:nth-child(3) .metric-icon {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .metric-card:nth-child(4) .metric-icon {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    .metric-card:nth-child(5) .metric-icon {
        background: linear-gradient(135deg, #f44336, #d32f2f);
    }

    .metric-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: block;
    }

    .metric-label {
        color: #64748b;
        font-weight: 500;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .metric-trend {
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
        margin-top: 0.5rem;
    }

    .trend-up {
        color: #4CAF50;
    }

    .trend-down {
        color: #f44336;
    }

    .trend-neutral {
        color: #64748b;
    }

    /* Filter Bar */
    .filter-bar {
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

    .filter-group {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .filter-label {
        font-weight: 500;
        color: #64748b;
        font-size: 0.9rem;
    }

    .filter-select {
        padding: 0.5rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
        min-width: 120px;
    }

    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .export-btn {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
    }

    .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        color: white;
    }

    /* Charts Grid */
    .charts-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .chart-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .chart-subtitle {
        color: #64748b;
        font-size: 0.9rem;
        margin-top: 0.2rem;
    }

    .chart-content {
        min-height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .chart-placeholder {
        text-align: center;
        color: #64748b;
    }

    .chart-placeholder i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #667eea;
        opacity: 0.7;
    }

    /* Data Tables */
    .data-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 0.5rem;
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
    }

    .data-table tr:hover {
        background: rgba(102, 126, 234, 0.05);
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    /* Progress Bars */
    .progress-bar-container {
        background: #f1f5f9;
        height: 8px;
        border-radius: 4px;
        overflow: hidden;
        margin-top: 0.5rem;
    }

    .progress-bar {
        height: 100%;
        border-radius: 4px;
        transition: width 1s ease-in-out;
    }

    .progress-green {
        background: linear-gradient(135deg, #4CAF50, #45a049);
    }

    .progress-blue {
        background: linear-gradient(135deg, #2196F3, #1976D2);
    }

    .progress-orange {
        background: linear-gradient(135deg, #FF9800, #F57C00);
    }

    .progress-purple {
        background: linear-gradient(135deg, #9C27B0, #7B1FA2);
    }

    /* Quick Insights */
    .insights-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .insight-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-left: 4px solid #667eea;
    }

    .insight-title {
        font-size: 1rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .insight-text {
        color: #64748b;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .charts-grid {
            grid-template-columns: 1fr;
        }

        .metrics-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .filter-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            justify-content: space-between;
        }

        .metrics-grid {
            grid-template-columns: 1fr;
        }

        .page-title {
            font-size: 1.5rem;
            flex-direction: column;
            gap: 0.5rem;
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

    /* Loading States */
    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 2rem auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header animate-in">
        <h1 class="page-title">
            <i class="fas fa-chart-line"></i>
            Reports & Analytics
        </h1>
        <p class="page-subtitle">Comprehensive analysis and insights of Anak Kariah data</p>
    </div>

    <!-- Key Metrics -->
    <div class="metrics-grid animate-in">
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-users"></i>
            </div>
            <span class="metric-number" data-target="{{ $totalAnakKariah ?? 248 }}">{{ $totalAnakKariah ?? 248 }}</span>
            <div class="metric-label">Total Members</div>
            <div class="metric-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+12 this month</span>
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <span class="metric-number" data-target="{{ $activeMembers ?? 186 }}">{{ $activeMembers ?? 186 }}</span>
            <div class="metric-label">Active Members</div>
            <div class="metric-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+8 this week</span>
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <span class="metric-number" data-target="{{ $totalAreas ?? 15 }}">{{ $totalAreas ?? 15 }}</span>
            <div class="metric-label">Coverage Areas</div>
            <div class="metric-trend trend-neutral">
                <i class="fas fa-minus"></i>
                <span>No change</span>
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-percentage"></i>
            </div>
            <span class="metric-number" data-target="{{ round((($activeMembers ?? 186) / ($totalAnakKariah ?? 248)) * 100) }}">{{ round((($activeMembers ?? 186) / ($totalAnakKariah ?? 248)) * 100) }}%</span>
            <div class="metric-label">Active Rate</div>
            <div class="metric-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+2.5% vs last month</span>
            </div>
        </div>
        
        <div class="metric-card">
            <div class="metric-icon">
                <i class="fas fa-calendar-plus"></i>
            </div>
            <span class="metric-number" data-target="12">12</span>
            <div class="metric-label">New This Month</div>
            <div class="metric-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>+5 vs last month</span>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar animate-in">
        <div class="filter-group">
            <label class="filter-label">Time Period:</label>
            <select class="filter-select" id="timePeriod">
                <option value="all">All Time</option>
                <option value="year">This Year</option>
                <option value="month">This Month</option>
                <option value="week">This Week</option>
            </select>
        </div>
        <div class="filter-group">
            <label class="filter-label">Area:</label>
            <select class="filter-select" id="areaFilter">
                <option value="all">All Areas</option>
                <option value="taman_desa">Taman Desa</option>
                <option value="bandar_baru">Bandar Baru</option>
                <option value="kampung_melayu">Kampung Melayu</option>
                <option value="taman_indah">Taman Indah</option>
            </select>
        </div>
        <div class="filter-group">
            <button class="export-btn" onclick="exportData()">
                <i class="fas fa-download"></i>
                Export Report
            </button>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-grid animate-in">
        <!-- Main Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">
                        <i class="fas fa-chart-pie"></i>
                        Distribution by Area
                    </h3>
                    <p class="chart-subtitle">Breakdown of Anak Kariah members across different areas</p>
                </div>
            </div>
            <div class="chart-content">
                @if(isset($chartComponent) || class_exists('App\\Http\\Livewire\\AnakKariahChart'))
                    <livewire:anak-kariah-chart />
                @else
                    <div class="chart-placeholder">
                        <i class="fas fa-chart-pie"></i>
                        <h4>Chart Loading...</h4>
                        <p>Livewire chart component will be displayed here</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Secondary Chart -->
        <div class="chart-container">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">
                        <i class="fas fa-chart-bar"></i>
                        Monthly Trends
                    </h3>
                    <p class="chart-subtitle">Registration trends over time</p>
                </div>
            </div>
            <div class="chart-content">
                <div class="chart-placeholder">
                    <i class="fas fa-chart-bar"></i>
                    <h4>Trend Analysis</h4>
                    <p>Monthly registration patterns</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Insights -->
    <div class="insights-grid animate-in">
        <div class="insight-card">
            <h4 class="insight-title">
                <i class="fas fa-lightbulb"></i>
                Key Insight
            </h4>
            <p class="insight-text">
                Taman Desa area shows the highest concentration of active members, accounting for 28% of total registrations.
            </p>
        </div>
        <div class="insight-card">
            <h4 class="insight-title">
                <i class="fas fa-trending-up"></i>
                Growth Trend
            </h4>
            <p class="insight-text">
                Member registrations have increased by 15% compared to the same period last year, showing strong community engagement.
            </p>
        </div>
        <div class="insight-card">
            <h4 class="insight-title">
                <i class="fas fa-exclamation-triangle"></i>
                Attention Needed
            </h4>
            <p class="insight-text">
                Kampung Melayu area has a 23% inactive rate, which is higher than average. Consider targeted outreach programs.
            </p>
        </div>
    </div>

    <!-- Detailed Statistics Table -->
    <div class="data-section animate-in">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-table"></i>
                Detailed Area Statistics
            </h3>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Total Members</th>
                        <th>Active</th>
                        <th>Inactive</th>
                        <th>Active Rate</th>
                        <th>Growth</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Taman Desa</strong></td>
                        <td>68</td>
                        <td>52</td>
                        <td>16</td>
                        <td>
                            76%
                            <div class="progress-bar-container">
                                <div class="progress-bar progress-green" style="width: 76%"></div>
                            </div>
                        </td>
                        <td style="color: #4CAF50;">+5</td>
                    </tr>
                    <tr>
                        <td><strong>Bandar Baru</strong></td>
                        <td>54</td>
                        <td>42</td>
                        <td>12</td>
                        <td>
                            78%
                            <div class="progress-bar-container">
                                <div class="progress-bar progress-blue" style="width: 78%"></div>
                            </div>
                        </td>
                        <td style="color: #4CAF50;">+3</td>
                    </tr>
                    <tr>
                        <td><strong>Kampung Melayu</strong></td>
                        <td>48</td>
                        <td>37</td>
                        <td>11</td>
                        <td>
                            77%
                            <div class="progress-bar-container">
                                <div class="progress-bar progress-orange" style="width: 77%"></div>
                            </div>
                        </td>
                        <td style="color: #f44336;">-1</td>
                    </tr>
                    <tr>
                        <td><strong>Taman Indah</strong></td>
                        <td>42</td>
                        <td>33</td>
                        <td>9</td>
                        <td>
                            79%
                            <div class="progress-bar-container">
                                <div class="progress-bar progress-purple" style="width: 79%"></div>
                            </div>
                        </td>
                        <td style="color: #4CAF50;">+2</td>
                    </tr>
                    <tr>
                        <td><strong>Bandar Utama</strong></td>
                        <td>36</td>
                        <td>22</td>
                        <td>14</td>
                        <td>
                            61%
                            <div class="progress-bar-container">
                                <div class="progress-bar progress-green" style="width: 61%"></div>
                            </div>
                        </td>
                        <td style="color: #4CAF50;">+3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate metrics on page load
        const metricNumbers = document.querySelectorAll('.metric-number[data-target]');
        
        metricNumbers.forEach(metric => {
            const target = parseInt(metric.getAttribute('data-target'));
            animateNumber(metric, 0, target, 2000);
        });

        // Animate progress bars
        setTimeout(() => {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }, 500);

        // Filter functionality
        const timePeriodFilter = document.getElementById('timePeriod');
        const areaFilter = document.getElementById('areaFilter');

        timePeriodFilter.addEventListener('change', function() {
            updateCharts();
        });

        areaFilter.addEventListener('change', function() {
            updateCharts();
        });

        // Add animation delays
        const animateElements = document.querySelectorAll('.animate-in');
        animateElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.1}s`;
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

    // Update charts based on filters
    function updateCharts() {
        const timePeriod = document.getElementById('timePeriod').value;
        const area = document.getElementById('areaFilter').value;
        
        // Show loading state
        const chartContents = document.querySelectorAll('.chart-content');
        chartContents.forEach(content => {
            if (!content.querySelector('livewire')) {
                content.innerHTML = '<div class="loading-spinner"></div>';
            }
        });

        // Simulate data update (replace with actual AJAX call)
        setTimeout(() => {
            console.log(`Updating charts for period: ${timePeriod}, area: ${area}`);
            // Here you would make an AJAX call to update the charts
            // or trigger a Livewire component update
        }, 1000);
    }

    // Export functionality
    function exportData() {
        const timePeriod = document.getElementById('timePeriod').value;
        const area = document.getElementById('areaFilter').value;
        
        // Create export URL with filters
        const exportUrl = `/admin/statistics/export?period=${timePeriod}&area=${area}`;
        
        // Show loading state
        const exportBtn = document.querySelector('.export-btn');
        const originalText = exportBtn.innerHTML;
        exportBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Exporting...';
        exportBtn.disabled = true;
        
        // Simulate export (replace with actual export logic)
        setTimeout(() => {
            exportBtn.innerHTML = originalText;
            exportBtn.disabled = false;
            
            // In a real implementation, you would:
            // window.location.href = exportUrl;
            alert('Export functionality would be implemented here');
        }, 2000);
    }

    // Refresh data periodically
    setInterval(() => {
        // Auto-refresh data every 5 minutes
        // You can implement live data updates here
        console.log('Auto-refreshing dashboard data...');
    }, 300000);
</script>
@endsection