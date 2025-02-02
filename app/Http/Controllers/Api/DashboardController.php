<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarRegistration;
use App\Models\PalletRegister;
use App\Models\CarRegisterProduct;
use App\Models\LSP;
use DB;

class DashboardController extends Controller
{
    public function table()
    {
        
        $report = LSP::leftJoin('car_registrations', 'l_s_p_s.id', '=', 'car_registrations.lsp_id')
            ->select('l_s_p_s.id', 'l_s_p_s.lsp_name', DB::raw('COUNT(car_registrations.id) as total_registrations'))
            ->groupBy('l_s_p_s.id', 'l_s_p_s.lsp_name')
            ->get()
            ->map(function ($item) {
                return [
                    'lsp_name' => $item->lsp_name,
                    'total_registrations' => $item->total_registrations ?: 0 
                ];
            });
    
        return response()->json([
            'message' => 'Dashboard report fetched successfully',
            'data' => $report
        ]);
    }




    public function graphic(Request $request)
{
    
    $validated = $request->validate([
        'year' => 'required|integer|digits:4'
    ]);
    $report = LSP::leftJoin('car_registrations', 'l_s_p_s.id', '=', 'car_registrations.lsp_id')
        ->whereYear('car_registrations.created_at', $validated['year']) 
        ->select(
            'l_s_p_s.id',
            'l_s_p_s.lsp_name',
            DB::raw('MONTH(car_registrations.created_at) as month'),
            DB::raw('COUNT(car_registrations.id) as total_registrations')
        )
        ->groupBy('l_s_p_s.id', 'l_s_p_s.lsp_name', DB::raw('MONTH(car_registrations.created_at)'))
        ->get()
        ->map(function ($item) {
            return [
                'lsp_name' => $item->lsp_name,
                'month' => $item->month,
                'total_registrations' => $item->total_registrations ?: 0 
            ];
        });

    return response()->json([
        'message' => 'Dashboard report fetched successfully',
        'data' => $report
    ]);
}


public function productionreport(Request $request)
{
    $year = $request->input('year', date('Y'));
    $productionLines = [
        'Canning line 1',
        'Canning line 2',
        'Bottling line Carton',
        'Bottling line Crate',
        'Keg line 1',
        'Keg line 2'
    ];
    $reportData = [];


    for ($month = 1; $month <= 12; $month++) {
        $monthlyReport = [];

        foreach ($productionLines as $line) {
          
            $count = PalletRegister::where('production_line', $line)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $monthlyReport[$line] = $count; 
        }

        $reportData[] = [
            'month' => $month,
            'report' => $monthlyReport
        ];
    }

    return response()->json([
        'message' => 'Production report fetched successfully',
        'data' => $reportData
    ]);
}

    
}
