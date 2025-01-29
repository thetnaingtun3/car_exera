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
            'Customer Name',
            'Truck Number',
            'Type of Truck',
            'Driver Name',
            'Order Number',
            'Truck Size',
            'Created At',
        ];
    }

    /**
     * Map the data for the exported Excel file
     */
    public function map($carRegisterProduct): array
    {
        return [
            $carRegisterProduct->id,
            $carRegisterProduct->lsp->lsp_name ?? 'N/A', // Fetch LSP name, fallback to 'N/A' if null
            $carRegisterProduct->customer->customer_name ?? 'N/A', // Fetch Customer name
            $carRegisterProduct->truck->licence_plate ?? $carRegisterProduct->car_number, // Truck number or car_number
            $carRegisterProduct->truck->vehicle_type ?? 'N/A', // Type of Truck
            $carRegisterProduct->driver_name ?? 'N/A', // Driver Name
            $carRegisterProduct->order_number ?? 'N/A', // Order Number
            $carRegisterProduct->truck->size ?? 'N/A', // Type Size
            $carRegisterProduct->created_at->format('d-m-Y H:i:s'), // Created At
        ];
    }
}
