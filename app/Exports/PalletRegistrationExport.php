<?php

namespace App\Exports;

use App\Models\PalletRegister;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PalletRegistrationExport implements FromQuery, WithHeadings, WithMapping
// class PalletRegistrationExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $counter = 1; // Counter starts at 1

    /**
     * Constructor to receive start and end dates.
     */
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Fetch the PalletRegister data based on selected dates.
     *
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     // Validate the date range (max 14 days)
    //     if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 14) {
    //         return collect([]); // Return empty collection if invalid
    //     }

    //     return PalletRegister::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    // }
    public function query()
    {
        return PalletRegister::whereBetween('created_at', [$this->startDate, $this->endDate]);
    }
    /**
     * Define the column headings for the Excel file.
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
     */
    public function map($pallet): array
    {
        return [

            $this->counter++, // Auto-incrementing ID starting from 1

            $pallet->pallet_number ?? 'N/A',
            $pallet->product_type ?? 'N/A',
            $pallet->production_line ?? 'N/A',
            $pallet->volume ?? 0,
            $pallet->unit ?? 'N/A',
            $pallet->total_amount_per_pallet ?? 0,
            $pallet->created_at ? $pallet->created_at->format('d-m-Y') : 'N/A',
            $pallet->created_at ? $pallet->created_at->format('h:i:s') : 'N/A',
        ];
    }
}
