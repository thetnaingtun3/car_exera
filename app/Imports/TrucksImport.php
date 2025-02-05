<?php

namespace App\Imports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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

        $validator = Validator::make($row, [

            'licence_plate' => 'required|regex:/^\d[A-Z]-\d{4}$/|unique:trucks,licence_plate',
        ]);

        if ($validator->fails()) {
            // Collect error messages for this row
            $this->errors[] = "Row with Car Number  '{$row['truck_number']}' and Name '{$row['driver_name']}' failed validation: " . implode(', ', $validator->errors()->all());
            return null;  // Skip invalid row
        }


        return new Truck([

            'lsp_id' => $this->lsp_id,
            'licence_plate' => $row['truck_number'],
            'size' => $row['truck_type'],
            'driver_name' => $row['driver_name'],
        ]);
    }
}
