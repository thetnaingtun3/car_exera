<?php

namespace App\Exports;

use App\Models\CarRegistration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class CarRegistrationExport implements FromQuery, WithHeadings, WithMapping
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
     * Query the data, ensuring only records within the selected date range (Max: 14 Days)
     */
    public function query()
    {
        return CarRegistration::with(['lsp', 'customer', 'truck'])
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);
    }

    /**
     * Define the column headings for the Excel export
     */
    public function headings(): array
    {
        return [
            'ID',
            'LSP Name',
            'Truck Number',
            'Driver Name',
            'Customer Name',
            'Order Number',
            'Truck Size',
            'Register Date',
            'Time',
        ];
    }

    /**
     * Map the data for the exported Excel file
     */
    public function map($carRegisterProduct): array
    {
        return [

            $this->counter++, // Auto-incrementing ID starting from 1
            $carRegisterProduct->lsp->lsp_name ?? 'N/A', // Fetch LSP name, fallback to 'N/A' if null
            $carRegisterProduct->truck->licence_plate ?? $carRegisterProduct->car_number, // Truck number or car_number
            $carRegisterProduct->driver_name ?? 'N/A', // Driver Name
            $carRegisterProduct->customer->customer_name ?? 'N/A', // Fetch Customer name
            $carRegisterProduct->order_number ?? 'N/A', // Order Number
            $carRegisterProduct->truck->size ?? 'N/A', // Type Size
            $carRegisterProduct->created_at->format('d-m-Y'), // Created At
            $carRegisterProduct->created_at->format('h:i:s'), // Created At
        ];
    }
}
