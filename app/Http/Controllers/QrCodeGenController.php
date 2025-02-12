<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CarRegistration;
use App\Models\PalletRegister;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGenController extends Controller
{
    public function qrcodegen($id)
    {


        $findData = CarRegistration::with(['lsp', 'customer', 'truck'])->find($id);
        if ($findData->status == '0') {

            $findData->update(['status' => '1', 'click_date' => now()]);
        }


        $record = CarRegistration::with(['lsp', 'customer', 'truck'])->find($findData->id);

        // Handle missing record
        if (!$record) {
            abort(404, 'Record not found.');
        }

        // Format the data for the QR code
        $qrData = sprintf(
            "LSPName:  %s\nCar Number:  %s\nDriver Name:  %s\nDelivery Order Number: %s\nType of Truck:  %s\nCustomer Name:  %s\nDate and Time:  %s",
            $record->lsp?->lsp_name ?? 'No LSP Assigned',
            $record->truck?->licence_plate ?? 'No Truck Assigned',
            $record->driver_name,
            $record->order_number,

            $record->truck?->size ?? 'Unknown Size',
            $record->customer?->customer_name ?? 'No Customer Assigned',

            // $record->click_date,
            // date('d-m-Y H:i:s', strtotime($record->click_date)),
            Carbon::parse($record->click_date)->format('d-m-Y H:i:s'),
        );

        // Generate the QR Code
        $qrCode = QrCode::size(200)->generate($qrData);

        return view('qr-code-page', [
            'qrCode' => $qrCode,
            'record' => $record,
        ]);
    }

    public function palletQrCode($id)
    {
        // Find the PalletRegister record by ID
        $record = PalletRegister::find($id);
        if ($record->status == '0') {

            $record->update(['status' => '1', 'click_date' => now()]);
        }


        // Handle missing record
        if (!$record) {
            abort(404, 'Pallet not found.');
        }

        // Format the data for the QR code
        $qrData = sprintf(
            "Pallet Number: PLT - %s\nProduct Type: %s\nProduction Line: %s\nPackage: %s\nVolume: %s\nUnit: %s\nTotal: %s\nDate: %s",
            $record->pallet_number,
            $record->product_type,
            $record->production_line,
            $record->package,
            $record->volume,
            $record->unit,
            $record->total_amount_per_pallet,

            Carbon::parse($record->click_date)->format('d-m-Y H:i:s'),
        );

        // Generate the QR Code
        $qrCode = QrCode::size(200)->generate($qrData);

        // Return the QR code view
        return view('pallet-qr-code-pag', [
            'qrCode' => $qrCode,
            'record' => $record,
        ]);
    }


    public function printCarQRCodes(Request $request)
    {
        $carIds = explode(',', $request->query('ids'));
        $selectedCars = CarRegistration::whereIn('id', $carIds)->get();

        $carsWithQrCodes = $selectedCars->map(function ($car) {
            // Format the QR data
            $qrData = sprintf(
                "LSPName:  %s\nCar Number:  %s\nDriver Name:  %s\nDelivery Order Number: %s\nType of Truck:  %s\nCustomer Name:  %s\nDate and Time:  %s",
                $car->lsp?->lsp_name ?? 'No LSP Assigned',
                $car->truck?->licence_plate ?? 'No Truck Assigned',
                $car->driver_name,
                $car->order_number,
                $car->truck?->size ?? 'Unknown Size',
                $car->customer?->customer_name ?? 'No Customer Assigned',
                Carbon::parse($car->click_date)->format('d-m-Y H:i:s'),
            );

            // Generate the QR code
            $qrCode = QrCode::size(200)->generate($qrData);

            return [
                'qrCode' => $qrCode,
                'record' => $car,
            ];

        });
        foreach ($selectedCars as $car) {
            if ($car->status == '0') {
                $car->update(['status' => '1', 'click_date' => now()]);
            }
        }

        return view('livewire.carprint-qr-codes', compact('carsWithQrCodes'));
    }

    public function printQRCodes(Request $request)
    {
        $palletIds = explode(',', $request->query('ids'));
        $selectedPallets = PalletRegister::whereIn('id', $palletIds)->get();
        // selectedPallets of status data update


        $palletsWithQrCodes = $selectedPallets->map(function ($pallet) {
            // Format the QR data
            $qrData = sprintf(
                "Pallet Number: PLT - %s\nProduct Type: %s\nProduction Line: %s\nPackage: %s\nVolume: %s\nUnit: %s\nTotal: %s\nDate: %s",
                $pallet->pallet_number,
                $pallet->product_type,
                $pallet->production_line,
                $pallet->package,
                $pallet->volume,
                $pallet->unit,
                $pallet->total_amount_per_pallet,
                Carbon::parse($pallet->created_at)->format('d-m-Y H:i:s')
            );

            $qrCode = QrCode::size(200)->generate($qrData);

            return [
                'pallet' => $pallet,
                'qrCode' => $qrCode,
            ];
        });
        foreach ($selectedPallets as $pallet) {
            if ($pallet->status == '0') {
                $pallet->update(['status' => '1', 'click_date' => now()]);
            }
        }

        return view('livewire.pallet-resiter.print-qr-codes', compact('palletsWithQrCodes'));
    }

    public function qrcodeDateChange(Request $request)
    {
        $carIds = explode(',', $request->query('ids'));
        $selectedCars = CarRegistration::whereIn('id', $carIds)->get();
        return view('car_qr_date_change', compact('selectedCars', 'carIds'));
    }

    public function qrcodeDateChangePost(Request $request)
    {
        $carIds = explode(',', $request->query('ids'));
        $selectedCars = CarRegistration::whereIn('id', $carIds)->get();
        foreach ($selectedCars as $car) {
            $car->update(['click_date' => $request->click_date]);

        }

        return redirect()->route('order.history');
    }


    // please write for pallet
    public function palletQrCodeDateChange(Request $request)
    {
        $palletIds = explode(',', $request->query('ids'));
        $selectedPallets = PalletRegister::whereIn('id', $palletIds)->get();
        return view('pallet_qr_date_change', compact('selectedPallets', 'palletIds'));
    }

    public function palletQrCodeDateChangePost(Request $request)
    {
        // Validate input to ensure date is provided
        $request->validate([
            'click_date' => 'required|date',
        ]);

        // Get Pallet IDs from the request query
        $palletIds = explode(',', $request->query('ids'));

        // Check if any pallets exist before updating
        if (empty($palletIds)) {
            return back()->with('error', 'No pallets selected.');
        }

        // Update click_date for selected pallets
        PalletRegister::whereIn('id', $palletIds)->update(['click_date' => $request->click_date]);

        // Redirect with success message
        return redirect()->route('pallet.history')->with('success', 'Click Date updated successfully.');
    }

}
