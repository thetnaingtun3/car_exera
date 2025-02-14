@section('dashboard-active', 'bg-gray-100 group') <div class="p-4">
    <div class="px-4 py-2 bg-gray-200 rounded-md">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Dashboard</span>
        </span>
    </div>
    <section class="mt-6 flex flex-wrap lg:flex-nowrap gap-6">
        <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4">
            @hasanyrole('admin|registration|loading|production|root-admin')
                @if (auth()->user()->hasRole('registration') || auth()->user()->hasRole('root-admin'))
                    <h3 class="text-md font-semibold text-gray-700 dark:text-gray-300 text-center mb-3">LSP Report</h3>
                    <!-- Year and Month Selection -->
                    <div class="flex items-center justify-center mb-4">
                        <label for="yearSelect" class="mr-2 text-gray-700 dark:text-gray-300">Year:</label>
                        <select id="yearSelect" class="border rounded px-2 py-1 dark:bg-gray-700 dark:text-white">
                            <option value="2024">2024</option>
                            <option value="2025" selected>2025</option>
                        </select>
                        <label for="monthSelect" class="ml-4 mr-2 text-gray-700 dark:text-gray-300">Month:</label>
                        <select id="monthSelect" class="border rounded px-2 py-1 dark:bg-gray-700 dark:text-white">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="overflow-hidden rounded-lg border border-gray-200">
                        <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                            <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                <tr>
                                    <th class="px-3 py-2 text-left">LSP Name</th>
                                    <th class="px-3 py-2 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody id="dashboardTableBody"
                                class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-800">
                                <tr>
                                    <td colspan="2" class="text-center py-2 text-gray-500">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            @endif
            @php
                $isProductionUser = auth()->user()->hasRole('production');
                $isRootAdmin = auth()->user()->hasRole('root-admin');
            @endphp <!-- Right Side: Production Report Chart -->
            @if ($isProductionUser || $isRootAdmin)
                <div
                    class="{{ $isProductionUser ? 'w-full' : 'w-full lg:w-1/2' }} bg-white shadow-md dark:bg-gray-800 rounded-lg p-4 mt-6">
                    <div class="flex flex-col items-center">
                        <label for="productionYearSelect"
                            class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">Production Report:</label>
                        <select id="productionYearSelect" class="px-4 py-2 border rounded-md mb-4">
                            <option value="2024">2024</option>
                            <option value="2025" selected>2025</option>
                        </select>
                    </div>
                    <canvas id="productionChart"></canvas>
                </div>
               

            @endif
        </section>

        @if ($isProductionUser || $isRootAdmin)
      <section>
        <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4">
            <div class="flex flex-col items-center">
            <label for="yearSelect" class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">
            Production Monthly Report:</label>
                <label for="monthlyYearSelect"
                    class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">Select Year:</label>
                <select id="monthlyYearSelect" class="px-4 py-2 border rounded-md mb-2">
                    <option value="2024">2024</option>
                    <option value="2025" selected>2025</option>
                </select>
                
                <label for="monthlyMonthSelect"
                    class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">Select Month:</label>
                <select id="monthlyMonthSelect" class="px-4 py-2 border rounded-md mb-4">
                    <option value="1">January</option>
                    <option value="2" selected>February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <canvas id="monthlyProductionChart"></canvas>
        </div>


        
</section>



        @endif

        <!-- Right Side: CarQr code Report -->
        @if (auth()->user()->hasRole('registration') || auth()->user()->hasRole('root-admin'))
            <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4">
                <div class="flex flex-col items-center">
                    <label for="yearSelect" class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">CarQr Code
                        Report:</label>
                    <select id="yearSelect" class="px-4 py-2 border rounded-md mb-4">
                        <option value="2024">2024</option>
                        <option value="2025" selected>2025</option>
                    </select>
                </div>
                <canvas id="dashboardChart"></canvas>
            </div>
        @endif
       

        @if (auth()->user()->hasRole('loading') || auth()->user()->hasRole('root-admin'))
            <!-- Dropdown for selecting year and month -->
            <div class="flex flex-col items-center">
                <label for="loadingReportYearSelect"
                    class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">Loading
                    Report:</label>
                <select id="loadingReportYearSelect" class="px-4 py-2 border rounded-md mb-4">
                    <option value="2024">2024</option>
                    <option value="2025" selected>2025</option>
                </select>
                <select id="loadingReportMonthSelect" class="px-4 py-2 border rounded-md mb-4">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <div class="w-full bg-white shadow-md dark:bg-gray-800 rounded-lg p-4 mt-6">
                    <h3 class="text-md font-semibold text-gray-700 dark:text-gray-300 text-center mb-3">Loading Report</h3>
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-3 py-2 text-left">LSP Name</th>
                                    <th class="px-3 py-2 text-right">Day 1</th>
                                    <th class="px-3 py-2 text-right">Day 2</th>
                                    <th class="px-3 py-2 text-right">Day 3</th>
                                    <th class="px-3 py-2 text-right">Day 4</th>
                                    <th class="px-3 py-2 text-right">Day 5</th>
                                    <th class="px-3 py-2 text-right">Day 6</th>
                                    <th class="px-3 py-2 text-right">Day 7</th>
                                    <th class="px-3 py-2 text-right">Day 8</th>
                                    <th class="px-3 py-2 text-right">Day 9</th>
                                    <th class="px-3 py-2 text-right">Day 10</th>
                                    <th class="px-3 py-2 text-right">Day 11</th>
                                    <th class="px-3 py-2 text-right">Day 12</th>
                                    <th class="px-3 py-2 text-right">Day 13</th>
                                    <th class="px-3 py-2 text-right">Day 14</th>
                                    <th class="px-3 py-2 text-right">Day 15</th>
                                    <th class="px-3 py-2 text-right">Day 16</th>
                                    <th class="px-3 py-2 text-right">Day 17</th>
                                    <th class="px-3 py-2 text-right">Day 18</th>
                                    <th class="px-3 py-2 text-right">Day 19</th>
                                    <th class="px-3 py-2 text-right">Day 20</th>
                                    <th class="px-3 py-2 text-right">Day 21</th>
                                    <th class="px-3 py-2 text-right">Day 22</th>
                                    <th class="px-3 py-2 text-right">Day 23</th>
                                    <th class="px-3 py-2 text-right">Day 24</th>
                                    <th class="px-3 py-2 text-right">Day 25</th>
                                    <th class="px-3 py-2 text-right">Day 26</th>
                                    <th class="px-3 py-2 text-right">Day 27</th>
                                    <th class="px-3 py-2 text-right">Day 28</th>
                                    <th class="px-3 py-2 text-right">Day 29</th>
                                    <th class="px-3 py-2 text-right">Day 30</th>
                                    <th class="px-3 py-2 text-right">Day 31</th>
                                    <th class="px-3 py-2 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody id="loadingReportTableBody"
                                class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-800">
                                <tr>
                                    <td colspan="2" class="text-center py-2 text-gray-500">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endhasanyrole
</div>
</div>
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var isRoot = @json(auth()->user()->hasRole('root-admin'));
    var isProduction = @json(auth()->user()->hasRole('production'));
    var isLoading = @json(auth()->user()->hasRole('loading'));
    var isRegistration = @json(auth()->user()->hasRole('registration'));


    document.addEventListener("DOMContentLoaded", function() {
        const productionCtx = document.getElementById('productionChart')?.getContext('2d');
        const dashboardCtx = document.getElementById('dashboardChart')?.getContext('2d');
        let productionChart, dashboardChart;
        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth() + 1;

        if (isRoot) {
            document.getElementById("yearSelect").value = currentYear;
            document.getElementById("monthSelect").value = currentMonth;
            fetchLoadingReportData(currentYear, currentMonth);


        } else if (isRegistration) {
            document.getElementById("yearSelect").value = currentYear;
            document.getElementById("monthSelect").value = currentMonth;
            fetchTableData();
            fetchGraphData(currentYear);


        } else if (isProduction) {
            document.getElementById("productionYearSelect").value = currentYear;
            fetchProductionData(currentYear);
        } else if (isLoading) {
            document.getElementById("loadingReportYearSelect").value = currentYear;
            document.getElementById("loadingReportMonthSelect").value = currentMonth;
            fetchLoadingReportData(currentYear, currentMonth);
        }




        function fetchTableData() {
            const year = document.getElementById("yearSelect").value;
            const month = document.getElementById("monthSelect").value;
            fetch(`{{ route('api.table') }}?year=${year}&month=${month}`).then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("dashboardTableBody");
                    tableBody.innerHTML = "";
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(item => {
                            const row = `

<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
	<td class="px-3 py-2">${item.lsp_name}</td>
	<td class="px-3 py-2 text-right">${item.total_registrations}</td>
</tr>
                        `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML = `

<tr>
	<td colspan="2" class="text-center py-2 text-gray-500">No data available</td>
</tr>
                    `;
                    }
                }).catch(error => {
                    console.error("Error fetching dashboard data:", error);
                    document.getElementById("dashboardTableBody").innerHTML = `

<tr>
	<td colspan="2" class="text-center py-2 text-red-500">Error loading data</td>
</tr>
                `;
                });
        }

        function fetchGraphData(year) {
            fetch("{{ route('api.graphic') }}?year=" + year).then(response => response.json()).then(data => {
                console.log("Dashboard Graph Data:", data);
                if (data.data) {
                    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                        'August', 'September', 'October', 'November', 'December'
                    ];
                    const registrations = Array(12).fill(0);
                    data.data.forEach(item => {
                        registrations[item.month - 1] = item.total_registrations;
                    });
                    if (dashboardChart) {
                        dashboardChart.destroy();
                    }
                    dashboardChart = new Chart(dashboardCtx, {
                        type: "bar",
                        data: {
                            labels: monthNames,
                            datasets: [{
                                label: "Total Registrations",
                                data: registrations,
                                backgroundColor: "rgba(54, 162, 235, 0.5)",
                                borderColor: "rgba(54, 162, 235, 1)",
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    console.error("Invalid data format from API:", data);
                }
            }).catch(error => {
                console.error("Error fetching graph data:", error);
            });
        }

        function fetchProductionData(year) {
            fetch(`{{ route('api.productionreport') }}?year=${year}`).then(response => response.json()).then(
                data => {
                    console.log("Production Data:", data);
                    if (data.data) {
                        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                            'August', 'September', 'October', 'November', 'December'
                        ];
                        const productionData = {
                            "Canning line 1": Array(12).fill(0),
                            "Canning line 2": Array(12).fill(0),
                            "Bottling line Carton": Array(12).fill(0),
                            "Bottling line Crate": Array(12).fill(0),
                            "Keg line 1": Array(12).fill(0),
                            "Keg line 2": Array(12).fill(0)
                        };
                        data.data.forEach(item => {
                            const month = item.month - 1;
                            Object.keys(item.report).forEach(line => {
                                productionData[line][month] = item.report[line];
                            });
                        });
                        if (productionChart) {
                            productionChart.destroy();
                        }
                        productionChart = new Chart(productionCtx, {
                            type: "bar",
                            data: {
                                labels: monthNames,
                                datasets: Object.keys(productionData).map((line, index) => ({
                                    label: line,
                                    data: productionData[line],
                                    backgroundColor: ["rgba(255, 99, 132, 0.5)",
                                        "rgba(54, 162, 235, 0.5)",
                                        "rgba(255, 159, 64, 0.5)",
                                        "rgba(75, 192, 192, 0.5)",
                                        "rgba(153, 102, 255, 0.5)",
                                        "rgba(255, 159, 64, 0.5)"
                                    ][index],
                                    borderColor: ["rgba(255, 99, 132, 1)",
                                        "rgba(54, 162, 235, 1)",
                                        "rgba(255, 159, 64, 1)",
                                        "rgba(75, 192, 192, 1)",
                                        "rgba(153, 102, 255, 1)",
                                        "rgba(255, 159, 64, 1)"
                                    ][index],
                                    borderWidth: 1
                                }))
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    } else {
                        console.error("Invalid data format from API:", data);
                    }
                }).catch(error => {
                console.error("Error fetching production data:", error);
            });
        }

        const monthlyProductionCtx = document.getElementById('monthlyProductionChart')?.getContext('2d');
let monthlyProductionChart;

document.getElementById("monthlyYearSelect").addEventListener("change", fetchMonthlyProductionData);
document.getElementById("monthlyMonthSelect").addEventListener("change", fetchMonthlyProductionData);

function fetchMonthlyProductionData() {
    const year = document.getElementById("monthlyYearSelect").value;
    const month = document.getElementById("monthlyMonthSelect").value;
    
    fetch(`{{ route('api.productionmonthlyreport') }}?year=${year}&month=${month}`)
        .then(response => response.json())
        .then(data => {
            if (data.data) {
                const labels = []; // Store dates
                const datasets = []; // Store datasets for each line
                
                // Define color for each production line
                const lineColors = {
                    "Canning line 1": "rgba(75, 192, 192, 0.5)",
                    "Canning line 2": "rgba(153, 102, 255, 0.5)",
                    "Bottling line Carton": "rgba(255, 159, 64, 0.5)",
                    "Bottling line Crate": "rgba(255, 99, 132, 0.5)",
                    "Keg line 1": "rgba(54, 162, 235, 0.5)",
                    "Keg line 2": "rgba(255, 205, 86, 0.5)"
                };

                // Process the data
                data.data.forEach(item => {
                    labels.push(item.date); // Add the date to the labels
                    item.lines.forEach(line => {
                        // Check if the dataset for this line already exists
                        const existingDataset = datasets.find(dataset => dataset.label === line.line);
                        if (existingDataset) {
                            // Push the count for the specific day
                            existingDataset.data.push(line.count);
                        } else {
                            // Create a new dataset for this line
                            datasets.push({
                                label: line.line,
                                data: [line.count],
                                backgroundColor: lineColors[line.line] || "rgba(0, 0, 0, 0.1)", // Default color if not found
                                borderColor: lineColors[line.line] || "rgba(0, 0, 0, 0.5)",
                                borderWidth: 1
                            });
                        }
                    });
                });

                // Destroy the previous chart if it exists
                if (monthlyProductionChart) {
                    monthlyProductionChart.destroy();
                }

                // Create a new chart with the updated data
                monthlyProductionChart = new Chart(monthlyProductionCtx, {
                    type: 'bar',
                    data: {
                        labels: labels, // Set the dates as labels
                        datasets: datasets // Set datasets for each production line
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                console.error("Invalid data format from API:", data);
            }
        })
        .catch(error => {
            console.error("Error fetching monthly production data:", error);
        });
}



fetchMonthlyProductionData();


        function fetchLoadingReportData(year, month) {
            fetch(`{{ route('api.loadingreport') }}?year=${year}&month=${month}`).then(response => response
                .json()).then(data => {
                console.log("Loading Report Data:", data);
                if (data.data) {
                    const tableBody = document.getElementById("loadingReportTableBody");
                    tableBody.innerHTML = "";
                    data.data.forEach(item => {
                        const lspName = item.lsp_name;
                        let totalCount = 0;
                        let row = `

<tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
	<td class="px-3 py-2">${lspName}</td>
                    `;
                        for (let i = 1; i <= 30; i++) {
                            const dayData = item.data.find(day => day.day === i);
                            const count = dayData ? dayData.count : 0;
                            totalCount += count;
                            row += `

	<td class="px-3 py-2 text-right">${count}</td>
                        `;
                        }
                        row += `

	<td class="px-3 py-2 text-right">${totalCount}</td>
</tr>
                    `;
                        tableBody.innerHTML += row;
                    });
                }
            }).catch(error => {
                console.error("Error fetching loading report data:", error);
                document.getElementById("loadingReportTableBody").innerHTML = `
<tr>
	<td colspan="32" class="text-center py-2 text-red-500">Error loading data</td>
</tr>`;
            });
        }
        document.getElementById("productionYearSelect").addEventListener("change", function() {
            fetchProductionData(this.value);
        });
        document.getElementById("yearSelect").addEventListener("change", function() {
            fetchGraphData(this.value);
            fetchProductionData(this.value);
        });
        document.getElementById("loadingReportYearSelect").addEventListener("change", function() {
            const year = this.value;
            const month = document.getElementById("loadingReportMonthSelect").value;
            fetchLoadingReportData(year, month);
        });
        document.getElementById("loadingReportMonthSelect").addEventListener("change", function() {
            const year = document.getElementById("loadingReportYearSelect").value;
            const month = this.value;
            fetchLoadingReportData(year, month);
        });
        document.getElementById("yearSelect").addEventListener("change", fetchTableData);
        document.getElementById("monthSelect").addEventListener("change", fetchTableData);
        document.getElementById("productionYearSelect").addEventListener("change", function() {
            fetchProductionData(this.value);
        });
        fetchGraphData(2025);
        fetchTableData();
        fetchProductionData(currentYear);
    });
    undefined
</script>

