<?php

namespace App\Imports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class TrucksImport implements ToModel, WithHeadingRow
{
    protected $lsp_id;
    public $errors = [];  // Collect validation errors

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
        // Validation rules for licence_plate to match only the format 1F-4755
        $validator = Validator::make($row, [
            'truck_number' => [
                'required',
                'regex:/^\d[A-Z]-\d{4}$/',  // Strict format: 1F-4755
                'unique:trucks,licence_plate',
            ],
        ], [
            'truck_number.required' => 'The truck number is required.',
            'truck_number.regex' => 'The truck number format is invalid. It should match the format "1F-4755".',
            'truck_number.unique' => 'The truck number already exists in the system.',
        ]);

        if ($validator->fails()) {
            // Collect error messages for this row
            $this->errors[] = "Row with Car Number '{$row['truck_number']}' and Name '{$row['driver_name']}' failed validation: " . implode(', ', $validator->errors()->all());
            return null;  // Skip invalid row
        }

        // Return a new Truck model to be inserted into the database
        return new Truck([
            'lsp_id' => $this->lsp_id,
            'licence_plate' => $row['truck_number'],
            'size' => $row['truck_type'],
            'driver_name' => $row['driver_name'],
        ]);
    }
}
