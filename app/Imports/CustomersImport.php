<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
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

        return new Customer([
            'lsp_id' => $this->lsp_id,
            'customer_code' => $row['customer_code'], // Map to Excel column
            'customer_name' => $row['customer_name'], // Map to Excel column
            // 'customer_code' => $row['0'],
            // 'customer_name' => $row['1'],
        ]);
    }
}
