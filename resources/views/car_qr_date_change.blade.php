<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>

    <script src="{{ asset('css/tailwind.css') }}"></script>

</head>


<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <h1 class="mb-4 text-2xl font-bold">Registration Date</h1>
        <!-- Display QR Code -->

        <div class="mb-4 grid grid-cols-3 ">

            @foreach ($selectedCars as $record)
                <div class="w-full px-6 mx-auto mt-6">
                    <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-8 ">

                        <p><strong>LSP Name:</strong> {{ $record->lsp?->lsp_name ?? 'No LSP Assigned' }}</p>
                        <p><strong>Car Number:</strong>
                            @if ($record->car_id === null)
                                {{ $record->licence_plate }}
                            @else
                                {{ $record->truck->licence_plate }}
                            @endif
                        </p>
                        <p><strong>Driver Name:</strong> {{ $record->driver_name }}</p>
                        <p><strong>Delivery Order Number:</strong> {{ $record->order_number }}</p>
                        <p><strong>Type of Truck:</strong>
                            @if ($record->car_id === null)
                                {{ $record->size }}
                            @else
                                {{ $record->truck->size }}
                            @endif
                        </p>
                        <p><strong>Customer Name:</strong>
                            {{ $record->customer?->customer_name ?? 'No Customer Assigned' }}</p>

                    </div>
                </div>
            @endforeach

        </div>

        <div class=" mt-5">

            Registered Date

            {{ \Carbon\Carbon::parse($selectedCars->last()->click_date)->format('d-m-Y H:i:s') }}
            <br>
            <!-- Start Date -->

        </div>


        <form action="{{ route('car-qr-date-change', ['ids' => implode(',', $carIds)]) }}" method="post">
            @csrf
            <input type="hidden" name="selectedCars" value="{{ json_encode($selectedCars) }}">
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Registered Date
                    (MM/DD/YYYY)</label>
                <input name="click_date" type="date"
                    class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mt-4 px-4">
                <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded">Go
                    Back</a>
                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Submit</button>
            </div>

        </form>


    </div>

</body>

</html>
