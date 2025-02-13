<div class="p-6 bg-white rounded-md shadow">
    <h2 class="mb-4 text-lg font-semibold text-gray-800">Car Registration Details</h2>
    <!-- Buttons -->
    <div class="flex justify-start p-4 space-x-2">
        <x-form.button color="primary" wire:navigate :href="route('reg.car')">Back
        </x-form.button>
    </div>


    <!-- Car Registration Details -->
    <table class="min-w-full mb-6 border border-collapse border-gray-200">
        <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Field</th>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Value</th>
        </tr>
        </thead>
        <tbody>
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">LSP Name</td>


            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $registration->lsp->lsp_name }}
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Customer Name</td>


            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">
            {{ $registration->customer->customer_name }}
        </tr>


        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">
                Delivery Order Number
            </td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">


                @php
                    $numbers = explode(',', $registration['order_number']);
                @endphp
                @foreach ($numbers as $number)
                    {{ $number }}<br>
                @endforeach

            </td>
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Truck Number</td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">


                @if ($registration->car_id == null)
                    {{ $registration->licence_plate }}
                @else
                    {{ $registration->truck->licence_plate }}
                @endif
            </td>
        </tr>

        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Driver Name</td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">


                @if ($registration->driver_id == null)
                    {{ $registration->driver_name }}
                @else
                    {{ $registration->truck->driver_name }}
                @endif
            </td>
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Truck Type</td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">


                @if ($registration->car_id == null)
                    {{ $registration->size }}
                @else
                    {{ $registration->truck->size }}
                @endif
            </td>
        </tr>

        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Remark</td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $registration['remark'] }}</td>
        </tr>

        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">Created At</td>
            <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">
                {{ \Carbon\Carbon::parse($registration['created_at'])->format('d-m-Y') }}</td>
        </tr>
        </tbody>
    </table>

    <!-- Products Details -->
    <h3 class="mb-3 font-semibold text-gray-700 text-md">Products</h3>
    <table class="min-w-full border border-collapse border-gray-200">
        <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Product</th>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Package</th>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Quantity</th>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Unit</th>
            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-600 border border-gray-200">Created At
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($registration['products'] as $product)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $product['product'] }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $product['package'] }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $product['qty'] }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">{{ $product['unit'] }}</td>
                <td class="px-4 py-2 text-sm text-gray-700 border border-gray-200">
                    {{ \Carbon\Carbon::parse($product['created_at'])->format('d-m-Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
