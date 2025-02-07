<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerDataExport implements FromQuery, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $counter = 1; // Counter starts at 1

    /**
     * Constructor to receive start and end dates.
     */
    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Fetch all customer data with the LSP relationship.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // Use eager-loading to fetch LSP data along with customer data
        $query = Customer::with('lsp');

        // Apply date filters if provided
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        return $query;
    }

    /**
     * Define the column headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'LSP Name',
            'Customer Code',
            'Customer Name',
            'Status',
        ];
    }

    /**
     * Map the data to match the headings structure.
     *
     * @param $customer
     * @return array
     */
    public function map($customer): array
    {
        return [
//            $this->counter++, // Auto-incrementing ID starting from 1

            $customer->id,
            $customer->lsp->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
            $customer->customer_code ?? 'N/A',
            $customer->customer_name ?? 'N/A',
            $customer->status == 'active' ? 'Active' : 'Inactive',
        ];
    }
}
