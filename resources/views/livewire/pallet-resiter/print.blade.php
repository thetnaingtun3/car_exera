<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Selected Pallets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .print-button {
            display: none;
        }

        /* Hide button in print */
    </style>
</head>

<body>
    <h2>Selected Pallets for Print</h2>
    <table>
        <thead>
            <tr>
                <th>Pallet Number</th>
                <th>Product Type</th>
                <th>Production Line</th>
                <th>Volume</th>
                <th>Unit</th>
                <th>Total</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($selectedPallets as $pallet)
                <tr>
                    <td>{{ $pallet->pallet_number }}</td>
                    <td>{{ $pallet->product_type }}</td>
                    <td>{{ $pallet->production_line }}</td>
                    <td>{{ $pallet->volume }}</td>
                    <td>{{ $pallet->unit }}</td>
                    <td>{{ $pallet->total_amount_per_pallet }}</td>
                    <td>{{ $pallet->created_at->format('d-m-Y') }}</td>
                    <td>{{ $pallet->created_at->format('h:i:s A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Print Button -->
    <button onclick="window.print()" class="print-button">Print</button>
</body>

</html>
