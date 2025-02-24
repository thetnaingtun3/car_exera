@section('lsp-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">LSP</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">

                <!-- Total Count -->
                <div class="flex gap-10 items-start justify-start">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>

                    <a href="{{ route('create.lsp') }}"
                       class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                        Create
                    </a>

                    <a href="{{ route('import.lsp') }}"
                       class="px-4 py-2 text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300">
                        Import
                    </a>

                    <!-- <button wire:click="exportData"
                            class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        Export Data
                    </button> -->
                    <button id="exportBtn"  class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">Export to Excel</button>
                </div>

                <div class="relative w-80 mt-5">
                    <input wire:model.live.debounce.300ms="search" type="text"
                           class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Search">
                </div>
                  
                <div class="px-3 py-4">
    @if ($lsps->lastPage() > 1)
        {{ $lsps->links() }}
    @else
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-end">
            <span class="relative inline-flex rounded-md shadow-sm">
                <!-- Disabled Previous Button -->
                <span aria-disabled="true" aria-label="Previous">
                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 dark:bg-gray-800 dark:border-gray-600" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>

                <!-- Current Page (Disabled) -->
                <span aria-current="page">
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">1</span>
                </span>

                <!-- Disabled Next Button -->
                <span aria-disabled="true" aria-label="Next">
                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5 dark:bg-gray-800 dark:border-gray-600" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>
            </span>
        </nav>
    @endif
</div>

            </div>
            
        </div>


        <!-- LSP Table -->
        <div class="overflow-x-auto px-5   mt-4">
            <table id="myTable" class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th class="px-4 py-3 text-start">ID</th>
                    <th class="px-4 py-3 text-start">LSP Name</th>
                    <th class="px-4 py-3 text-start">Status</th>
                    <th class="px-4 py-3 text-start">Creation Date</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lsps as $key => $lsp)
                    <tr wire:key="{{ $lsp->id }}" class="border-b">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $lsp->id }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $lsp->lsp_name }}</td>
                        @if ($lsp->status == 'active')
                            <td class="px-4 py-3 font-medium text-green-500">{{ $lsp->status }}</td>
                        @else
                            <td class="px-4 py-3 font-medium text-red-500">{{ $lsp->status }}</td>
                        @endif


                        <td class="px-4 py-3">{{ $lsp->created_at->format('d-m-Y ') }}</td>
                        {{--                        <td class="px-4 py-3">{{ $lsp->created_at->format('d-m-Y h:i:s A') }}</td>--}}
                        <td class="flex   items-center justify-center my-2">
                            @if (!$lsp->customers()->exists() && !$lsp->trucks()->exists())
                                <x-form.button class="bg-red-700 hover:bg-red-800"
                                               wire:confirm="Are you sure you want to delete {{ $lsp->lsp_name }}?"
                                               wire:click="deleteLSP({{ $lsp->id }})">
                                    <x-phosphor.icons::regular.trash class="w-6 h-6 mx-1 text-white"/>
                                </x-form.button>
                            @endif
                            <x-form.button wire:navigate secondary :href="route('edit.lsp', $lsp->id)">
                                <x-phosphor.icons::regular.pen class="w-6 h-6 mr-1 text-white"/>
                            </x-form.button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        
    </section>
</div>

<script src="{{ asset('js/xlsx.full.min.js') }}"></script>
<script>
function exportTableToExcel(tableID, filename = '') {
  let table = document.getElementById(tableID);
  let wb = XLSX.utils.book_new();
  

  let wsData = [];
  let rows = table.querySelectorAll("tr");

  rows.forEach(row => {
      let rowData = [];
      let cells = row.querySelectorAll("th, td");

      cells.forEach((cell, index) => {
         
          if (index !== cells.length - 1) {
              rowData.push(cell.innerText);
          }
      });

      wsData.push(rowData);
  });


  let ws = XLSX.utils.aoa_to_sheet(wsData);
  XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

  filename = filename ? filename + '.xlsx' : 'export.xlsx';
  XLSX.writeFile(wb, filename);
}


document.getElementById("exportBtn").addEventListener("click", function () {
  exportTableToExcel("myTable", "isp_data");
});
    </script>