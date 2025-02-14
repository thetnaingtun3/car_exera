<?php

namespace App\Imports;

use App\Models\LoadingData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoadingDataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
      
        return new LoadingData([
            'delivery_date' => $row['delivery_date'],
            'delivery_order_number' => $row['delivery_order_number'],
            'lsp_name' => $row['lsp_name'],
            'customer_name' => $row['customer_name'],
            'truck_driver_name' => $row['truck_driver_name'],
            'truck_type' => $row['truck_type'],
            'product_type' => $row['product_type'],
            'volume' => $row['volume'],
            'production_line' => $row['production_line'],
            'pallet_number' => $row['pallet_number'],
        ]);
    }
}
