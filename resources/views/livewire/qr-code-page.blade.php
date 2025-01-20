<vdiv>
    If your happiness depends on money, you will never be happy with yourself.
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <h1 class="mb-4 text-2xl font-bold">QR Code</h1>

        <!-- Display QR Code -->
        <div class="mb-4">
            {{-- {!! $qrCode !!} --}}
            {{-- {{ $qrCode }} --}}
        </div>

        <!-- Display Record Data -->
        <div class="text-left">
            <p>Car Number: {{ $record['car_number'] }}</p>
            <p>Driver Name: {{ $record['driver_name'] }}</p>
            <p>Type of Truck: {{ $record['type_of_truck'] }}</p>
            <p>Customer Name: {{ $record['customer_name'] }}</p>
            <p>Date and Time: {{ $record['date_time'] }}</p>
        </div>

        <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded">Go Back</a>
    </div>
</vdiv>
