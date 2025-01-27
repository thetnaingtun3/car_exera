<?php

namespace App\Exports;

use App\Models\CarRegistration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class CarRegistrationExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return CarRegistration::all();
    // }
    public function query()
    {
        // Query users with their roles using eager loading


        return CarRegistration::with(['lsp', 'customer', 'truck']);
        // return CarRegistration::all();
    }
    public function headings(): array

    {
        return [
            'ID',
            'LSP Name',
            'Customer Name',
            'Truck Number',
            'Type of Truck',
            'Driver Name', // Add any custom field you want
            'Order Number',        // Include related data
            'Type Size',
            'Created At',

        ];
    }
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
