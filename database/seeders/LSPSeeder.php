<?php

namespace Database\Seeders;

use App\Models\LSP;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LSPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lsps = [
            'New Moe Makha',
            'Myint Nadi Services',
            'May Oo Paing',
            'New Royal Forty Five',
            'Htein Win and Brothers',
            'Kerry Logistics (Railway)',
            'Resources Group Logistics',
            'KAT Transportation',
            'Karzo Company Limited',
            'Locomo',
            'Customer Value Logistics',
            'Chindwin Cherry',
            'Myanmar Logistics Supply Chain',
            '24 Diamonds',
            'Aung Paw Tun',
        ];

        foreach ($lsps as $lspName) {
            LSP::create(['lsp_name' => $lspName]);
        }
        // DB::table('l_s_p_s')->insert($lsps);
    }
}
