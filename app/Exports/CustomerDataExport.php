<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerDataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Fetch all customer data with the LSP relationship.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Use eager-loading to fetch LSP data along with customer data
        return Customer::with('lsp')->get();
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
            $customer->id,
            $customer->lsp->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
            $customer->customer_code ?? 'N/A',
            $customer->customer_name ?? 'N/A',
        ];
    }
}
