<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print QR Codes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .qr-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .qr-box {
            width: 250px;
            padding: 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body onload="window.print(); setTimeout(() => window.close(), 500);">
    <h2>QR Codes for Selected Pallets</h2>

    <div class="qr-container">
        @foreach ($selectedPallets as $pallet)
            <div class="qr-box">
                <p><strong>Pallet Number:</strong> {{ $pallet->pallet_number }}</p>
                <img src="data:image/png;base64,{{ base64_encode(
                    QrCode::size(200)->generate(
                        "Pallet Number: PLT  -  {$pallet->pallet_number}\nProduct Type: {$pallet->product_type}\nProduction Line: {$pallet->production_line}\nVolume: {$pallet->volume}\nUnit: {$pallet->unit}\nTotal: {$pallet->total_amount_per_pallet}\nDate: {$pallet->created_at->format(
                            'd-m-Y H:i:s',
                        )}",
                    ),
                ) }}"
                    alt="QR Code">
            </div>
        @endforeach
    </div>
</body>

</html>
