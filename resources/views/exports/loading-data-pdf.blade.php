<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Data Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
            font-size: 10px;
        }

        td {
            font-size: 9px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .page-break {
            page-break-after: always;
        }

        /* Ensures multi-page PDFs split correctly */
    </style>
</head>

<body>

    <h2>Loading Data Report</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Delivery Date</th>
                <th>Delivery Order Number</th>
                <th>LSP Name</th>
                <th>Customer Name</th>
                <th>Truck Type</th>
                <th>Truck Driver Name</th>
                <th>Product Type</th>
                <th>Volume</th>
                <th>Production Line</th>
                <th>Pallet No.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loadingData as $key => $data)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $data->delivery_date }}</td>
                    <td>{{ $data->delivery_order_number }}</td>
                    <td>{{ $data->lsp_name }}</td>
                    <td>{{ $data->customer_name }}</td>
                    <td>{{ $data->truck_type }}</td>
                    <td>{{ $data->truck_driver_name }}</td>
                    <td>{{ $data->product_type }}</td>
                    <td>{{ $data->volume }}</td>
                    <td>{{ $data->production_line }}</td>
                    <td>{{ $data->pallet_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
