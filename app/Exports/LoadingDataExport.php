<?php

namespace App\Exports;

use App\Models\LoadingData;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

// class LoadingDataExport implements FromCollection

class LoadingDataExport implements FromQuery, WithHeadings, WithMapping
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
    //     if (now()->parse($this->startDate)->diffInDays(now()->parse($this->endDate)) > 31) {
    //         return collect([]); // Return empty collection if invalid
    //     }

    //     return  LoadingData::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    // }
    /**
     * Query the data, ensuring only records within the selected date range (Max: 14 Days)
     */
    public function query()
    {
        return LoadingData::whereBetween('created_at', [$this->startDate, $this->endDate]);
    }
    public function headings(): array
    {
        return [
            'ID',
            'Delivery Date',
            'Delivery Order Number',
            'LSP Name',
            'Customer Name',
            'Truck Type',
            'Truck Driver Name',
            'Product Type',
            'Volume',
            'Production Line',
            'Pallet No.',
        ];
    }

    public function map($loading): array
    {
        return [

            $this->counter++, // Auto-incrementing ID starting from 1
            $loading->delivery_date,
            $loading->delivery_order_number,
            $loading->lsp_name,
            $loading->customer_name,
            $loading->truck_type,
            $loading->truck_driver_name,
            $loading->product_type,
            $loading->volume,
            $loading->production_line,
            $loading->pallet_number,
        ];
    }
}
