<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    protected $lsp_id;
    public $errors = [];  // Collect validation errors


    public function __construct($lsp_id)
    {
        $this->lsp_id = $lsp_id;
    }

    public function model(array $row)
    {
        // Validate customer_code with exactly 7 digits
        $validator = Validator::make($row, [
            'customer_code' => 'required|digits:7',
            'customer_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Collect error messages for this row
            $this->errors[] = "Row with Customer Code '{$row['customer_code']}' and Name '{$row['customer_name']}' failed validation: " . implode(', ', $validator->errors()->all());
            return null;  // Skip invalid row
        }

        return new Customer([
            'lsp_id' => $this->lsp_id,
            'customer_code' => $row['customer_code'],
            'customer_name' => $row['customer_name'],
        ]);
    }
}
