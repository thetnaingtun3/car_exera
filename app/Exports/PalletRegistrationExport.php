<?php

namespace App\Exports;

use App\Models\PalletRegister;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PalletRegistrationExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Fetch all PalletRegister data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PalletRegister::all();
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
            'Pallet Number',
            'Product Type',
            'Production Line',
            'Volume',
            'Unit',
            'Total',
            'Date',
            'Time',
        ];
    }

    /**
     * Map the data to match the headings structure.
     *
     * @param $pallet
     * @return array
     */
    public function map($pallet): array
    {
        return [
            $pallet->id,
            $pallet->pallet_number ?? 'N/A',
            $pallet->product_type ?? 'N/A',
            $pallet->production_line ?? 'N/A',
            $pallet->volume ?? 0,
            $pallet->unit ?? 'N/A',
            $pallet->total_amount_per_pallet ?? 0,
            $pallet->created_at ? $pallet->created_at->format('d-m-Y') : 'N/A', // Extract date from created_at
            $pallet->created_at ? $pallet->created_at->format('H:i:s') : 'N/A', // Extract time from created_at
        ];
    }
}
