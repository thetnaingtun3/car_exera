<?php

namespace App\Livewire\Customer;

use App\Exports\CustomerDataExport;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Maatwebsite\Excel\Facades\Excel;

class CustomerList extends Component
{

    use WithPagination;


    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 20;

    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function exportData()
    {
        return Excel::download(new CustomerDataExport, 'data.xlsx');
    }
    #[Title('Customer List')]

    public function render()
    {

        $status = ($this->status === 'active') ? 'active' : (($this->status === 'inactive') ? 'inactive' : '');
        $customers = Customer::search($this->search)
            ->with("lsp")
            ->when($status !== '', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate(20);

        return view('livewire.customer.customer-list', compact('customers'));
    }
}
