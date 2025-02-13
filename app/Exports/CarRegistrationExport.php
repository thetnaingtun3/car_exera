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

    public function query()
    {
        if ($this->startDate === $this->endDate) {
            // Fetch records for that single date (entire day)
            return CarRegistration::with(['lsp', 'customer', 'truck'])
                ->whereDate('created_at', $this->startDate);
        }

        // Ensure end date includes the full day by appending "23:59:59"
        $startDateTime = $this->startDate . ' 00:00:00';
        $endDateTime = $this->endDate . ' 23:59:59';

        return CarRegistration::with(['lsp', 'customer', 'truck'])
            ->whereBetween('created_at', [$startDateTime, $endDateTime]);
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

    public function map($carRegisterProduct): array
    {


        return [
            $this->counter++,
            $carRegisterProduct->lsp->lsp_name ?? 'N/A',
            "'" . ($carRegisterProduct->car_id == null ? $carRegisterProduct->licence_plate : $carRegisterProduct->truck->licence_plate), // Force string format
            $carRegisterProduct->dirver_id == null ? $carRegisterProduct->driver_name : $carRegisterProduct->truck->driver_name ?? 'N/A',
            $carRegisterProduct->customer->customer_name ?? 'N/A',
            $carRegisterProduct->order_number ?? 'N/A',
            $carRegisterProduct->car_id == null ? $carRegisterProduct->size : $carRegisterProduct->truck->size ?? 'N/A',
            $carRegisterProduct->created_at->format('d-m-Y'),
            $carRegisterProduct->created_at->format('h:i:s'),
        ];
    }
}
