
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">QR Code</h1>

        <!-- Display QR Code -->
        <div class="mb-4">
            {!! $qrCode !!}
        </div>

        <!-- Display Record Details -->
        <div class="text-left">
            <p><strong>Car Number:</strong> {{ $record->truck?->licence_plate ?? 'No Truck Assigned' }}</p>
            <p><strong>Driver Name:</strong> {{ $record->id }}</p>
            <p><strong>Type of Truck:</strong> {{ $record->truck?->size ?? 'Unknown Size' }}</p>
            <p><strong>Customer Name:</strong> {{ $record->customer?->customer_name ?? 'No Customer Assigned' }}</p>
            <p><strong>Date and Time:</strong> {{ now()->format('d-m-Y H:i:s') }}</p>
        </div>

        <a href="{{ url()->previous() }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Go Back</a>
    </div>
</body>
</html>
