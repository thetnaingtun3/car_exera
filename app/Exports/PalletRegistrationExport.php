<?php

namespace App\Exports;

use App\Models\PalletRegister;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PalletRegistrationExport implements FromQuery, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $productType;
    protected $productionLine;
    protected $volume;
    protected $counter = 1; // Counter starts at 1


    /**
     * Constructor to receive start and end dates, product type, and production line.
     */
    public function __construct($startDate, $endDate, $productType = null, $productionLine = null, $volume = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->productType = $productType;
        $this->productionLine = $productionLine;
        $this->volume = $volume;
    }

    public function query()
    {
        // Ensure the end date includes the full day
        $startDateTime = $this->startDate . ' 00:00:00';
        $endDateTime = $this->endDate . ' 23:59:59';

        $query = PalletRegister::whereBetween('created_at', [$startDateTime, $endDateTime]);

        // Apply product type filter if provided
        if (!empty($this->productType)) {
            $query->where('product_type', $this->productType);
        }

        // Apply production line filter if provided, handling an array input
        if (!empty($this->productionLine)) {
            if (is_array($this->productionLine)) {
                $query->where(function ($q) {
                    $q->where('production_line', 'Bottling line Carton')
                        ->orWhere('production_line', 'Bottling line Crate');
                });
            } else {
                $query->where('production_line', $this->productionLine);
            }
        }

        // Apply volume filter if provided
        if (!empty($this->volume)) {
            $query->where('volume', $this->volume);
        }

        return $query;
    }
//    public function query()
//    {
//        // Ensure the end date includes the full day
//        $startDateTime = $this->startDate . ' 00:00:00';
//        $endDateTime = $this->endDate . ' 23:59:59';
//
//        $query = PalletRegister::whereBetween('created_at', [$startDateTime, $endDateTime]);
//
//        // Apply product type filter if provided
//        if (!empty($this->productType)) {
//            $query->where('product_type', $this->productType);
//        }
//
//        // Apply production line filter if provided
//        if (!empty($this->productionLine)) {
//            if (is_array($this->productionLine)) {
//                $query->whereIn('production_line', $this->productionLine);
//            } else {
//                $query->where('production_line', $this->productionLine);
//            }
//        }
//        // Apply volume filter if provided
//        if (!empty($this->volume)) {
//            $query->where('volume', $this->volume);
//        }
//
//        return $query;
//    }

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
