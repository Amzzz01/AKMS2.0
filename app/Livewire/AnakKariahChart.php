<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnakKariah;
use Illuminate\Support\Facades\DB;

class AnakKariahChart extends Component
{
    public $chartData;
    public $chartType = 'pie'; // pie, bar, line
    public $filterPeriod = 'all';
    public $filterArea = 'all';

    protected $listeners = ['updateChart' => 'updateChartData'];

    public function mount()
    {
        $this->updateChartData();
    }

    public function updateChartData()
    {
        // Get data grouped by area
        $query = AnakKariah::select('areas', DB::raw('count(*) as total'))
            ->groupBy('areas');

        // Apply filters if needed
        if ($this->filterPeriod !== 'all') {
            switch ($this->filterPeriod) {
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
            }
        }

        if ($this->filterArea !== 'all') {
            $query->where('areas', $this->filterArea);
        }

        $data = $query->get();

        // Prepare chart data
        $this->chartData = [
            'labels' => $data->pluck('areas')->toArray(),
            'datasets' => [
                [
                    'label' => 'Anak Kariah by Area',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(76, 175, 80, 0.8)',
                        'rgba(255, 152, 0, 0.8)',
                        'rgba(156, 39, 176, 0.8)',
                        'rgba(244, 67, 54, 0.8)',
                        'rgba(33, 150, 243, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(96, 125, 139, 0.8)',
                    ],
                    'borderColor' => [
                        'rgba(102, 126, 234, 1)',
                        'rgba(76, 175, 80, 1)',
                        'rgba(255, 152, 0, 1)',
                        'rgba(156, 39, 176, 1)',
                        'rgba(244, 67, 54, 1)',
                        'rgba(33, 150, 243, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(96, 125, 139, 1)',
                    ],
                    'borderWidth' => 2
                ]
            ]
        ];
    }

    public function updatedFilterPeriod()
    {
        $this->updateChartData();
    }

    public function updatedFilterArea()
    {
        $this->updateChartData();
    }

    public function setChartType($type)
    {
        $this->chartType = $type;
    }

    public function render()
    {
        return view('livewire.anak-kariah-chart');
    }
}