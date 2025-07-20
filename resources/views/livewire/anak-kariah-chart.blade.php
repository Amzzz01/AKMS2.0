<div class="chart-livewire-container">
    <!-- Chart Controls -->
    <div class="chart-controls" style="margin-bottom: 1.5rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <!-- Chart Type Selector -->
            <div class="chart-type-buttons">
                <button 
                    wire:click="setChartType('pie')" 
                    class="chart-type-btn {{ $chartType === 'pie' ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> Pie
                </button>
                <button 
                    wire:click="setChartType('bar')" 
                    class="chart-type-btn {{ $chartType === 'bar' ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i> Bar
                </button>
                <button 
                    wire:click="setChartType('doughnut')" 
                    class="chart-type-btn {{ $chartType === 'doughnut' ? 'active' : '' }}">
                    <i class="fas fa-chart-donut-alt"></i> Donut
                </button>
            </div>

            <!-- Refresh Button -->
            <button wire:click="updateChartData" class="refresh-btn">
                <i class="fas fa-sync-alt"></i> Refresh
            </button>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="chart-wrapper" style="position: relative; height: 350px;">
        @if(count($chartData['labels']) > 0)
            <canvas id="anakKariahChart" width="400" height="350"></canvas>
        @else
            <div class="no-data-state">
                <i class="fas fa-chart-pie" style="font-size: 3rem; color: #e2e8f0; margin-bottom: 1rem;"></i>
                <h4 style="color: #64748b; margin-bottom: 0.5rem;">No Data Available</h4>
                <p style="color: #9ca3af; font-size: 0.9rem;">No Anak Kariah data found for the selected filters.</p>
            </div>
        @endif
    </div>

    <!-- Chart Legend/Summary -->
    @if(count($chartData['labels']) > 0)
        <div class="chart-summary" style="margin-top: 1.5rem;">
            <div class="summary-grid">
                @foreach($chartData['labels'] as $index => $label)
                    <div class="summary-item">
                        <div class="summary-color" style="background-color: {{ $chartData['datasets'][0]['backgroundColor'][$index] ?? '#667eea' }};"></div>
                        <div class="summary-info">
                            <div class="summary-label">{{ $label ?: 'Unknown Area' }}</div>
                            <div class="summary-value">{{ $chartData['datasets'][0]['data'][$index] }} members</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Loading Overlay -->
    <div wire:loading class="loading-overlay">
        <div class="loading-spinner"></div>
        <div style="margin-top: 1rem; color: #64748b;">Updating chart...</div>
    </div>
</div>

<style>
    .chart-livewire-container {
        position: relative;
    }

    .chart-type-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .chart-type-btn {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        border: 2px solid rgba(102, 126, 234, 0.2);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.85rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .chart-type-btn:hover {
        background: rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.4);
    }

    .chart-type-btn.active {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-color: #667eea;
    }

    .refresh-btn {
        background: rgba(76, 175, 80, 0.1);
        color: #4CAF50;
        border: 2px solid rgba(76, 175, 80, 0.2);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.85rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .refresh-btn:hover {
        background: rgba(76, 175, 80, 0.2);
        border-color: rgba(76, 175, 80, 0.4);
    }

    .chart-wrapper {
        background: white;
        border-radius: 15px;
        padding: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .no-data-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        text-align: center;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .summary-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        border: 1px solid #f1f5f9;
    }

    .summary-color {
        width: 16px;
        height: 16px;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .summary-label {
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.9rem;
    }

    .summary-value {
        color: #64748b;
        font-size: 0.8rem;
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
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

    @media (max-width: 768px) {
        .chart-controls > div {
            flex-direction: column;
            align-items: stretch;
        }

        .chart-type-buttons {
            justify-content: center;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        initChart();
    });

    document.addEventListener('livewire:load', function() {
        initChart();
    });

    document.addEventListener('livewire:update', function() {
        initChart();
    });

    function initChart() {
        const canvas = document.getElementById('anakKariahChart');
        if (!canvas) return;

        // Destroy existing chart if it exists
        if (window.anakKariahChartInstance) {
            window.anakKariahChartInstance.destroy();
        }

        const ctx = canvas.getContext('2d');
        const chartData = @json($chartData);
        const chartType = @json($chartType);

        if (!chartData || !chartData.labels || chartData.labels.length === 0) {
            return;
        }

        // Chart configuration
        const config = {
            type: chartType,
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: chartType !== 'pie' && chartType !== 'doughnut',
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        borderColor: 'rgba(255, 255, 255, 0.2)',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed * 100) / total).toFixed(1);
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    }
                },
                scales: chartType === 'bar' ? {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                } : {},
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 1000
                }
            }
        };

        // Special configuration for doughnut charts
        if (chartType === 'doughnut') {
            config.options.cutout = '60%';
        }

        window.anakKariahChartInstance = new Chart(ctx, config);
    }
</script>