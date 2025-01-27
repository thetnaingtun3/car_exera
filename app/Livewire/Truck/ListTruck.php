<?php

namespace App\Livewire\Truck;

use App\Models\Truck;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Exports\TruckDataExport;
use Maatwebsite\Excel\Facades\Excel;

class ListTruck extends Component
{
    use WithPagination;


    #[Url(history: true)]
    public $search = '';


    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 20;

    public function exportData()
    {
        return Excel::download(new TruckDataExport, 'data.xlsx');
    }

    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }


    #[Title('Truck List')]
    public function render()
    {
        $trucks = Truck::search($this->search)
            ->with("lsp")
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate(20);



        return view('livewire.truck.list-truck', compact('trucks'));
    }
}
