<?php

namespace App\Exports;

use App\Models\LSP;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLspData implements FromCollection, WithHeadings, WithMapping
{

    protected $counter = 1; // Counter starts at 1

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LSP::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'LSP Name',
            'Status',
        ];
    }

    public function map($truck): array
    {
        return [

//            $this->counter++, // Auto-incrementing ID starting from 1

            $truck->id, // Fetch the LSP name, fallback to 'N/A' if null
            $truck->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
            $truck->status == 'active' ? 'Active' : 'Inactive',

        ];
    }
}
