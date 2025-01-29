<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
</head>

<body>
    <h1>Pallet Code</h1>
    <div>
        {!! $qrCode !!}
    </div>
    <div>
        <h3>Pallet Details</h3>
        <p><strong>Pallet Number:</strong> {{ $record->pallet_number }}</p>
        <p><strong>Product Type:</strong> {{ $record->product_type }}</p>
        <p><strong>Production Line:</strong> {{ $record->production_line }}</p>
        <p><strong>Package:</strong> {{ $record->package }}</p>
        <p><strong>Volume:</strong> {{ $record->volume }}</p>
        <p><strong>Unit:</strong> {{ $record->unit }}</p>
        <p><strong>Total:</strong> {{ $record->total_amount_per_pallet }}</p>

        <p><strong>Date and Time: </strong> {{ \Carbon\Carbon::parse($record->click_date)->format('d-m-Y H:i:s') }}
    </div>
</body>

</html>
