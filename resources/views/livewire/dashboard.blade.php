@section('dashboard-active', 'bg-gray-100 group')

<div class="p-4">
    <div class="px-4 py-2 bg-gray-200 rounded-md">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Dashboard</span></span>
    </div>

  
    <section class="mt-6 flex flex-wrap lg:flex-nowrap gap-6">
 
        <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4">
            <h3 class="text-md font-semibold text-gray-700 dark:text-gray-300 text-center mb-3">LSP Report</h3>
            
            <div class="overflow-hidden rounded-lg border border-gray-200">
                <table class="w-full text-sm text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-3 py-2 text-left">LSP Name</th>
                            <th class="px-3 py-2 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody id="dashboardTableBody" class="divide-y divide-gray-200 dark:divide-gray-600 bg-white dark:bg-gray-800">
                        <tr>
                            <td colspan="2" class="text-center py-2 text-gray-500">Loading...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Side: Production Report Chart -->
        <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4 mt-6">
            <div class="flex flex-col items-center">
                <label for="productionYearSelect" class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">Production Report:</label>
                <select id="productionYearSelect" class="px-4 py-2 border rounded-md mb-4">
                    <option value="2024">2024</option>
                    <option value="2025" selected>2025</option>
                </select>
            </div>
            <canvas id="productionChart"></canvas>
        </div>
    </section>

     <!-- Right Side: CarQr code Report -->
     <div class="w-full lg:w-1/2 bg-white shadow-md dark:bg-gray-800 rounded-lg p-4">
            <div class="flex flex-col items-center">
                <label for="yearSelect" class="text-md font-semibold text-gray-700 dark:text-gray-300 mb-2">CarQr Code Report:</label>
                <select id="yearSelect" class="px-4 py-2 border rounded-md mb-4">
                    <option value="2024">2024</option>
                    <option value="2025" selected>2025</option>
                </select>
            </div>
            <canvas id="dashboardChart"></canvas>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const productionCtx = document.getElementById('productionChart').getContext('2d');
        const dashboardCtx = document.getElementById('dashboardChart').getContext('2d');
        let productionChart, dashboardChart;

       
        function fetchTableData() {
            fetch("{{ route('api.table') }}")
                .then(response => response.json())
                .then(data => {
                    if (data.data) {
                        const tableBody = document.getElementById("dashboardTableBody");
                        tableBody.innerHTML = ""; 

                        data.data.forEach(item => {
                            const row = `
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-3 py-2">${item.lsp_name}</td>
                                    <td class="px-3 py-2 text-right">${item.total_registrations}</td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });
                    }
                })
                .catch(error => {
                    console.error("Error fetching dashboard data:", error);
                    document.getElementById("dashboardTableBody").innerHTML = `
                        <tr>
                            <td colspan="2" class="text-center py-2 text-red-500">Error loading data</td>
                        </tr>
                    `;
                });
        }

       
        function fetchGraphData(year) {
            fetch("{{ route('api.graphic') }}?year=" + year)
                .then(response => response.json())
                .then(data => {
                    console.log("Dashboard Graph Data:", data); 
                    if (data.data) {
                        const months = Array.from({ length: 12 }, (_, i) => i + 1); 
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
                                labels: months.map(m => `Month ${m}`),
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
                                    y: { beginAtZero: true }
                                }
                            }
                        });
                    } else {
                        console.error("Invalid data format from API:", data);
                    }
                })
                .catch(error => {
                    console.error("Error fetching graph data:", error);
                });
        }

      
        function fetchProductionData(year) {
            fetch(`{{ route('api.productionreport') }}?year=${year}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Production Data:", data); 
                    if (data.data) {
                        const months = Array.from({ length: 12 }, (_, i) => i + 1); 
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
                                labels: months.map(m => `Month ${m}`),
                                datasets: Object.keys(productionData).map((line, index) => ({
                                    label: line,
                                    data: productionData[line],
                                    backgroundColor: [
                                        "rgba(255, 99, 132, 0.5)", 
                                        "rgba(54, 162, 235, 0.5)", 
                                        "rgba(255, 159, 64, 0.5)",
                                        "rgba(75, 192, 192, 0.5)", 
                                        "rgba(153, 102, 255, 0.5)", 
                                        "rgba(255, 159, 64, 0.5)" 
                                    ][index],
                                    borderColor: [
                                        "rgba(255, 99, 132, 1)",
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
                                    y: { beginAtZero: true }
                                }
                            }
                        });
                    } else {
                        console.error("Invalid data format from API:", data);
                    }
                })
                .catch(error => {
                    console.error("Error fetching production data:", error);
                });
        }

       
        document.getElementById("productionYearSelect").addEventListener("change", function () {
            fetchProductionData(this.value);
        });
        document.getElementById("yearSelect").addEventListener("change", function () {
            fetchGraphData(this.value);
            fetchProductionData(this.value);
        });

        
        fetchGraphData(2025);
        fetchTableData();
        fetchProductionData(2025); 
    });
</script>
