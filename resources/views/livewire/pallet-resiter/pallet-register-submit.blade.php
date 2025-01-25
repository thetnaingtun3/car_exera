<div class="flex flex-wrap mt-8">
    <!-- Start Pallet Number -->
    <div class="w-full py-2">
        <x-form.input wire:model="start_pallet_number" type="number" label="Start Pallet Number"
            placeholder="Enter Start Pallet Number" />
        <x-form.input-error for="start_pallet_number" class="mt-2" />
    </div>

    <!-- End Pallet Number -->
    <div class="w-full py-2">
        <x-form.input wire:model="end_pallet_number" type="number" label="End Pallet Number"
            placeholder="Enter End Pallet Number" />
        <x-form.input-error for="end_pallet_number" class="mt-2" />
    </div>

    <!-- Product Type -->
    <div class="w-full py-2">
        <select wire:model.live="productType"
            class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
            <option value="">Select Product Type</option>
            @foreach ($this->productData as $type => $lines)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>
        <x-form.input-error for="productType" class="mt-2" />
    </div>

    <!-- Production Line -->
    <div class="w-full py-2">
        <select wire:model.live="productionLine"
            class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
            <option value="">Select Production Line</option>
            @foreach ($this->availableProductionLines as $line)
                <option value="{{ $line }}">{{ $line }}</option>
            @endforeach
        </select>
        <x-form.input-error for="productionLine" class="mt-2" />
    </div>

    <!-- Volume -->
    <div class="w-full py-2">
        <x-form.input wire:model="volume" type="text" label="Volume" placeholder="Volume" readonly />
        <x-form.input-error for="volume" class="mt-2" />
    </div>

    <!-- Unit -->
    <div class="w-full py-2">
        <x-form.input wire:model="unit" type="text" label="Unit" placeholder="Unit" readonly />
        <x-form.input-error for="unit" class="mt-2" />
    </div>

    <!-- Total Amount per Pallet -->
    <div class="w-full py-2">
        <x-form.input wire:model="totalAmountPerPallet" type="text" label="Total Amount per Pallet"
            placeholder="Total Amount per Pallet" readonly />
        <x-form.input-error for="totalAmountPerPallet" class="mt-2" />
    </div>

    <!-- Submit Button -->
    <div class="w-full py-4">
        <button wire:click="store"
            class="w-full px-4 py-2 text-sm font-semibold text-white transition-all duration-150 ease-linear bg-blue-500 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
            Register Pallets
        </button>
    </div>
</div>
