<?php

namespace App\Http\Controllers;

use App\Imports\LoadingDataImport;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class LoadingDataController extends Controller
{
    public function create()
    {
        return view('livewire.loading.loading-data-create');
    }

    public function store(Request $request)
    {
        // Validate that a file has been uploaded
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv', // Adjust the mime types as needed
        ]);

        try {
            // Retrieve the uploaded file
            $file = $request->file('file');

            // Import the file using the LoadingDataImport class
            Excel::import(new LoadingDataImport(), $file);

            // Send a success notification
            Notification::make()
                ->title('Loading Data Imported Successfully!')
                ->success()
                ->send();

            // Redirect to the loading data route
            return redirect()->route('loading.data');
        } catch (\Exception $e) {
            // Handle any errors that occur during the import process
            return back()->withErrors(['file' => 'Error during import: ' . $e->getMessage()]);
        }
    }


    public function downloadTemplate()
    {
        return response()->download(public_path('file/loading.xlsx'));
    }
}
