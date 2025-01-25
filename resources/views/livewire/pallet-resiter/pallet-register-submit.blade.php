<div>
    <!-- Product Type Dropdown -->
    <label for="product-type">Product Type</label>
    <select id="product-type" wire:model.live="productType" class="p-2 border rounded">
        <option value="">Select a Product Type</option>
        @foreach ($productData as $type => $lines)
            <option value="{{ $type }}">{{ $type }}</option>
        @endforeach
    </select>

    <!-- Production Line Dropdown -->
    @if (!empty($availableProductionLines))
        <div class="mt-4">
            <label for="production-line">Production Line</label>
            <select id="production-line" wire:model.live="productionLine" class="p-2 border rounded">
                <option value="">Select a Production Line</option>
                @foreach ($availableProductionLines as $line)
                    <option value="{{ $line }}">{{ $line }}</option>
                @endforeach
            </select>
        </div>
    @endif

    <!-- Input Fields -->
    <div class="mt-4">
        {{-- <label for="volume">Volume</label>
        <input id="volume" type="text" wire:model="volume" class="p-2 border rounded" readonly>

        <label for="unit">Unit</label>
        <input id="unit" type="text" wire:model="unit" class="p-2 border rounded" readonly>

        <label for="total">Total Amount per Pallet</label>
        <input id="total" type="text" wire:model="totalAmountPerPallet" class="p-2 border rounded" readonly> --}}
        <label for="start_pallet_number">Start Pallet Number</label>
        <input id="start_pallet_number" type="number" wire:model="start_pallet_number" class="p-2 border rounded"
            placeholder="Enter Start Pallet Number">

        <!-- End Pallet Number -->
        <label for="end_pallet_number" class="mt-2">End Pallet Number</label>
        <input id="end_pallet_number" type="number" wire:model="end_pallet_number" class="p-2 border rounded"
            placeholder="Enter End Pallet Number">

        <!-- Product Type -->
        <label for="product_type" class="mt-2">Product Type</label>
        <input id="product_type" type="text" wire:model="productType" class="p-2 border rounded"
            placeholder="Enter Product Type">

        <!-- Production Line -->
        <label for="production_line" class="mt-2">Production Line</label>
        <input id="production_line" type="text" wire:model="productionLine" class="p-2 border rounded"
            placeholder="Enter Production Line">

        <!-- Volume -->
        <label for="volume" class="mt-2">Volume</label>
        <input id="volume" type="text" wire:model="volume" class="p-2 border rounded" placeholder="Enter Volume">

        <!-- Unit -->
        <label for="unit" class="mt-2">Unit</label>
        <input id="unit" type="text" wire:model="unit" class="p-2 border rounded" placeholder="Enter Unit">

        <!-- Total Amount per Pallet -->
        <label for="total_amount_per_pallet" class="mt-2">Total Amount per Pallet</label>
        <input id="total_amount_per_pallet" type="text" wire:model="totalAmountPerPallet" class="p-2 border rounded"
            placeholder="Enter Total Amount per Pallet">

        <!-- Submit Button -->
        <button wire:click="store" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Register Pallets</button>

    </div>
    @if (session()->has('success'))
        <div class="mt-4 text-green-500">{{ session('success') }}</div>
    @elseif (session()->has('error'))
        <div class="mt-4 text-red-500">{{ session('error') }}</div>
    @endif
</div>
