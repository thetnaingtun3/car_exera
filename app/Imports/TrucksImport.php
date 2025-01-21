<?php

namespace App\Imports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrucksImport implements ToModel, WithHeadingRow
{
    protected $lsp_id;

    public function __construct($lsp_id)
    {
        $this->lsp_id = $lsp_id;
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Truck([

            'lsp_id' => $this->lsp_id,
            'licence_plate' => $row['truck_number'],
            // 'vehicle_type' => $row['2],
            'size' => $row['truck_type'],
        ]);
    }
}
