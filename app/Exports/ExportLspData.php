<?php

namespace App\Exports;

use App\Models\LSP;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLspData implements FromCollection, WithHeadings, WithMapping
{
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
        ];
    }
    public function map($truck): array
    {
        return [
            $truck->id,
            $truck->lsp_name ?? 'N/A', // Fetch the LSP name, fallback to 'N/A' if null
        ];
    }
}
