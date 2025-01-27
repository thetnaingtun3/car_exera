<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <h1 class="mb-4 text-2xl font-bold">Transporter Registration Code</h1>

        <!-- Display QR Code -->
        <div class="mb-4">
            {!! $qrCode !!}
        </div>

        <!-- Display Record Details -->
        <div class="text-left">
            <p><strong>LSP Name/ </strong> {{ $record->lsp?->lsp_name ?? 'No Truck Assigned' }}</p>
            <p><strong>Car Number/ </strong> {{ $record->truck?->licence_plate ?? 'No Truck Assigned' }}</p>
            <p><strong>Driver Name/ </strong> {{ $record->driver_name }}</p>
            <p><strong>Type of Truck/ </strong> {{ $record->truck?->size ?? 'Unknown Size' }}</p>
            <p><strong>Customer Name/ </strong> {{ $record->customer?->customer_name ?? 'No Customer Assigned' }}</p>
            {{-- <p><strong>Date and Time/ </strong> {{ $record->click_date }}</p> --}}
            <p><strong>Date and Time/ </strong> {{ \Carbon\Carbon::parse($record->click_date)->format('d-m-Y H:i:s') }}
            </p>
        </div>

        <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded">Go Back</a>
    </div>
</body>

</html>
