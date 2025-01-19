<?php

namespace App\Imports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\ToModel;

class TrucksImport implements ToModel
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
            'licence_plate' => $row[0],
            'vehicle_type' => $row[1],
            'size' => $row[2],
        ]);
    }
}
