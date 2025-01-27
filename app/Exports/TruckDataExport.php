<?php

namespace App\Exports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TruckDataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Fetch all Truck data with the LSP relationship.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager load the LSP relationship to avoid N+1 queries
        return Truck::with('lsp')->get();
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
            'Licence Plate',
            'Vehicle Type',
            'Size',
        ];
    }

    /**
     * Map the data to match the headings structure.
     *
     * @param $truck
     * @return array
     */
    public function map($truck): array
    {
        return [
            $truck->id,
            $truck->lsp->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
            $truck->licence_plate ?? 'N/A',
            $truck->vehicle_type ?? 'N/A',
            $truck->size ?? 'N/A',
        ];
    }
}
