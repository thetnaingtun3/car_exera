<?php

namespace App\Livewire\LSP;

use App\Models\LSP;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportLspData;
use Filament\Notifications\Notification;

class LSPList extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $startDate = '';

    #[Url(history: true)]
    public $endDate = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 20;

    public $count = 0;

    public function mount()
    {
        $this->count = LSP::count();
    }

    public function applyDateFilter()
    {
//        if (!empty($this->startDate) && !empty($this->endDate)) {
//            $diff = now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate));
//            if ($diff > 14) {
//                Notification::make()
//                    ->title('Date range cannot exceed 14 days.')
//                    ->danger()
//                    ->send();
//                return;
//            }
//        }
    }

    public function resetFilters()
    {
        $this->startDate = '';
        $this->endDate = '';
        $this->search = '';
    }

    public function exportData()
    {
        if (empty($this->startDate) || empty($this->endDate)) {
            Notification::make()
                ->title('Please select a valid date range.')
                ->danger()
                ->send();
            return;
        }

        $diff = now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate));
        if ($diff > 14) {
            Notification::make()
                ->title('Date range cannot exceed 14 days.')
                ->danger()
                ->send();
            return;
        }

        return Excel::download(new ExportLspData($this->startDate, $this->endDate), 'lsp_data.xlsx');
    }

    #[Title('LSP List')]
    public function render()
    {
        $query = LSP::search($this->search);

        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }
        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $lsps = $query
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.l-s-p.l-s-p-list', compact('lsps'));
    }
}
