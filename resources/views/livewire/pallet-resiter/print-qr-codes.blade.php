<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="{{ asset('css/tailwind.css') }}"></script>
    <title>Print QR Codes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f3f4f6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
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
            margin-top: 50px;
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

    {{-- <h1>QR Codes for Selected Pallets</h1> --}}

    <div class="qr-container">
        @foreach ($palletsWithQrCodes as $item)
            <div class="qr-box">
                <!-- QR Code on the Left -->
                <div class="qr-code">

                    {!! $item['qrCode'] !!}
                    {{-- <img src="data:image/png;base64,{{ $item['qrCode'] }}" alt="QR Code"> --}}
                </div>

                <!-- Pallet Details on the Right -->
                <div class="details">
                    {{-- <h2 class="text-lg font-bold mb-2">Pallet Number: PLT - {{ $item['pallet']->pallet_number }}</h2> --}}

                    <h2 class="text-lg font-bold mb-2">Pallet Number Code</h2>
                    <p><strong>Pallet Number:</strong> PLT - {{ $item['pallet']->pallet_number }}</p>
                    <p><strong>Product Type:</strong> {{ $item['pallet']->product_type }}</p>
                    <p><strong>Production Line:</strong> {{ $item['pallet']->production_line }}</p>
                    <p><strong>Package:</strong> {{ $item['pallet']->package }}</p>
                    <p><strong>Volume:</strong> {{ $item['pallet']->volume }}</p>
                    <p><strong>Unit:</strong> {{ $item['pallet']->unit }}</p>
                    <p><strong>Total:</strong> {{ $item['pallet']->total_amount_per_pallet }}</p>
                    <p><strong>Date and Time:</strong>
                        {{ \Carbon\Carbon::parse($item['pallet']->created_at)->format('d-m-Y H:i:s') }}
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
