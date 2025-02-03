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
    <div id="printArea">

        <h1 class="mb-4 text-2xl font-bold">Pallet Number Code</h1>
        <!-- Display QR Code -->
        <div class="mb-4">
            {!! $qrCode !!}
        </div>

        <div class="text-left">
            <h3>Pallet Details</h3>
            <p><strong>Pallet Number:</strong> {{ $record->pallet_number }}</p>
            <p><strong>Product Type:</strong> {{ $record->product_type }}</p>
            <p><strong>Production Line:</strong> {{ $record->production_line }}</p>
            <p><strong>Package:</strong> {{ $record->package }}</p>
            <p><strong>Volume:</strong> {{ $record->volume }}</p>
            <p><strong>Unit:</strong> {{ $record->unit }}</p>
            <p><strong>Total:</strong> {{ $record->total_amount_per_pallet }}</p>
            <p><strong>Date and Time:</strong> {{ \Carbon\Carbon::parse($record->click_date)->format('d-m-Y H:i:s') }}
            </p>
        </div>

    </div>
    <div class="mt-4 px-4">
        <button onclick="printQRCode()" class="px-4 py-2 text-white bg-green-500 rounded">Print QR Code</button>
        <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded">Go Back</a>
    </div>
</div>

<script>
    function printQRCode() {
        // Clone the content to a new print window
        var printContents = document.getElementById('printArea').innerHTML;
        var originalContents = document.body.innerHTML;

        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print QR Code</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
</body>

</html>
