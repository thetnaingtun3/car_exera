<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <script src="{{ asset('css/tailwind.css') }}"></script>

    <style>
        @media print {
            body {
                width: 100%;
                background-color: white;
            }

            #printArea {
                display: flex !important;
                align-items: flex-start;
                justify-content: space-between;
                width: 100%;
            }

            #printArea .qr-container {
                flex: 0 0 auto;
                margin-right: 20px;
            }

            #printArea .text-container {
                flex: 1;
            }

            #printArea img {
                max-width: 150px;
                height: auto;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="p-6 bg-white rounded-lg shadow-lg">

    <div id="printArea" class="flex items-start">
        <!-- QR Code Section -->

        <div class="qr-container mt-[11px] mr-6">
            {!! $qrCode !!}
        </div>

        <!-- Text Section -->
        <div class="text-container text-left">
            <h1 class="mb-4 text-2xl font-bold">LSP Registration Code</h1>

            <p><strong>LSP Name: </strong> {{ $record->lsp?->lsp_name ?? 'No Truck Assigned' }}</p>
            <p><strong>Car Number: </strong>
                @if($record->car_id === null)
                    {{$record->licence_plate}}
                @else
                    {{ $record->truck->licence_plate }}
                @endif
            </p>
            <p><strong>Driver Name: </strong> {{ $record->driver_name }}</p>
            <p><strong>Delivery Order Number: </strong> {{ $record->order_number }}</p>
            <p><strong>Type of Truck: </strong>

                @if($record->car_id === null)
                    {{$record->size}}

                @else
                    {{ $record->truck->size }}
                @endif
            </p>
            <p><strong>Customer Name: </strong> {{ $record->customer?->customer_name ?? 'No Customer Assigned' }}</p>
            <p><strong>Date and Time: </strong> {{ \Carbon\Carbon::parse($record->click_date)->format('d-m-Y H:i:s') }}
            </p>
        </div>
    </div>

    <!-- Buttons (Hidden in Print) -->
    <div class="mt-4 px-4 no-print">
        <button onclick="printQRCode()" class="px-4 py-2 text-white bg-green-500 rounded">Print QR Code</button>
        <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded">Go Back</a>
    </div>
</div>

<script>
    function printQRCode() {
        window.print();
    }
</script>

</body>

</html>
