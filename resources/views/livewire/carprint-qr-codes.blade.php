<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print QR Codes</title>
    <script src="{{ asset('css/tailwind.css') }}"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            text-align: center;
        }

        .qr-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .qr-box {
            width: 600px;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .qr-code img {
            width: 150px;
            height: 150px;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .details {
            font-size: 14px;
            text-align: left;
        }

        .details p {
            margin: 5px 0;
        }

        .no-print {
            margin-top: 20px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print(); setTimeout(() => window.close(), 500);">

<div class="qr-container">
    @foreach ($carsWithQrCodes as $item)
        <div class="qr-box">
            <!-- QR Code -->
            <div class="qr-code">
                {!! $item['qrCode'] !!}
            </div>

            <!-- Car Details -->
            <div class="details">
                <h2 class="text-lg font-bold mb-2">LSP Registration Code</h2>
                <p><strong>LSP Name:</strong> {{ $item['record']->lsp?->lsp_name ?? 'No Truck Assigned' }}</p>
                <p><strong>Car Number:</strong> {{ $item['record']->car_id == null ? $item['record']->licence_plate :  $item['record']->truck->licence_plate }}</p>
                <p><strong>Driver Name:</strong> {{ $item['record']->driver_name }}</p>
                <p><strong>Delivery Order Number:</strong> {{ $item['record']->order_number }}</p>
                <p><strong>Type of Truck:</strong> {{ $item['record']->car_id == null ? $item['record']->size :  $item['record']->truck->size }}</p>
                <p><strong>Customer
                        Name:</strong> {{ $item['record']->customer?->customer_name ?? 'No Customer Assigned' }}</p>
                <p><strong>Date and
                        Time:</strong> {{ \Carbon\Carbon::parse($item['record']->click_date)->format('d-m-Y H:i:s') }}
                </p>
            </div>
        </div>
    @endforeach
</div>

<!-- Navigation Buttons (Hidden on Print) -->
<div class="no-print">
    <button onclick="window.print()" class="px-4 py-2 bg-green-500 text-white rounded">Print QR Codes</button>
    <a href="{{ url()->previous() }}" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded">Go Back</a>
</div>

</body>

</html>
