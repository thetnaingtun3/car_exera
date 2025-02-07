<?php

namespace App\Exports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TruckDataExport implements FromQuery, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $counter = 1; // Counter starts at 1

    /**
     * Constructor to receive start and end dates.
     */
    //    public function __construct($startDate, $endDate)
    //    {
    //        $this->startDate = $startDate;
    //        $this->endDate = $endDate;
    //    }


    public function query()
    {
        return Truck::with(['lsp']);
        //            ->whereBetween('created_at', [$this->startDate, $this->endDate]);
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
            'Size',
            'Status',
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

//            $this->counter++, // Auto-incrementing ID starting from 1
            $truck->id, // Fetch the LSP name, fallback to 'N/A' if null
            $truck->licence_plate ?? 'N/A',
            $truck->lsp->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
            $truck->licence_plate ?? 'N/A',
            $truck->size ?? 'N/A',
            $truck->status == 'active' ? 'Active' : 'Inactive',
        ];
    }
}
