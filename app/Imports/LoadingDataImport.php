<?php

namespace App\Imports;

use App\Models\LoadingData;
use Maatwebsite\Excel\Concerns\ToModel;

class LoadingDataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LoadingData([
            'pallet_number' => $row['pallet_number'] ?? null,
            'product_type' => $row['product_type'] ?? null,
            'production_line' => $row['production_line'] ?? null,
            'package_type' => $row['package_type'] ?? null,
            'volume' => $row['volume'] ?? null,
            'unit' => $row['unit'] ?? null,
            'total' => $row['total'] ?? null,
            'date' => $row['date'] ?? null,
            'car_number' => $row['car_number'] ?? null,
        ]);
    }
}
