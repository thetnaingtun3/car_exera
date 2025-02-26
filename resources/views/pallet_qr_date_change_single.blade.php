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
    <div id="printArea">

        <h1 class="mb-4 text-2xl font-bold">Pallet Number </h1>
        <!-- Display QR Code -->
        <div class="mb-4 grid grid-cols-3 ">
            {{-- @foreach ($selectedPallets as $record) --}}
            <div class="w-full px-6 mx-auto mt-6">
                <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-8 ">


                    <p>
                        Pallet Number: PLT - {{ $record->pallet_number }} <br>
                        Product Type: {{ $record->product_type }} <br>
                        Production Line: {{ $record->production_line }} <br>
                        Package: {{ $record->package }} <br>
                        Volume: {{ $record->volume }} <br>
                        Unit: {{ $record->unit }} <br>
                        Total Amount per Pallet: {{ $record->total_amount_per_pallet }} <br>
                    </p>


                </div>
            </div>
            {{-- @endforeach --}}

        </div>
        <div class=" mt-5">


        Current Date
            {{ \Carbon\Carbon::parse($record->click_date)->format('d-m-Y H:i:s') }}


            <br>
            <!-- Start Date -->

        </div>


        <div class="text-left">


            <form class="mt-5" action="{{ route('car.qrcode.date.change.single.post') }}" method="POST">


                @csrf
                @method('POST')
                <div class="flex flex-wrap mt-8">
                    <!-- Select LSP -->

                    <div class="flex flex-wrap gap-2">


                        {{-- <input type="hidden" name="selectedCars" value="{{ json_encode($selectedPallets) }}"> --}}
                        {{-- {{ $selectedPallets }} --}}
                        <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                        <input type="hidden" name="pallet_id" value="{{ $record->id }} ">
                        <input type="hidden" name="old_date" value="{{ $record->click_date }} ">

                        <div class="w-full lg:w-6/12">
                            <label class="block text-sm font-medium text-gray-700">Production Current Date
                                (MM/DD/YYYY)</label>

                            <input name="click_date" type="date"
                                   value="{{ old('click_date', date('Y-m-d', strtotime($record->click_date))) }}"
                                   class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
{{--                            <input name="click_date" type="date"--}}
{{--                                   class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">--}}
                        </div>
                        <div class="mt-4 px-4">
                            <a href="/pallet/history"
                               class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded">Go Back</a>
                            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>


    </div>
</div>


</body>

</html>
