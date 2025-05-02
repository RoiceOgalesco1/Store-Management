<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <title>Dashboard</title>
</head>
<body class="bg-gray-50">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>    
    <div class="min-h-screen grid grid-cols-5">
        <!-- Sidebar -->
        <div class="col-span-1 bg-white border-r border-gray-200 p-4 flex flex-col items-center">
            <img src="./images/aln-logo.png" alt="Logo" class="w-32 h-32 object-contain mb-8 rounded-lg">
            
            <!-- Navigation Links -->
            <ul class="w-full space-y-2 -mt-8">
                <!-- Dashboard -->
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <!-- Sales -->
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                            Sales
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'transform rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" class="ml-8 mt-1 space-y-1 text-sm text-gray-600 ">
                        <li>
                            <a href="/manage_sale.html" class="block p-2 hover:bg-gray-100 rounded-lg transition">Manage Sale</a>
                        </li>
                        <li>
                            <a href="/add_sale.html" class="block p-2 hover:bg-gray-100 rounded-lg transition">Add Sale</a>
                        </li>
                    </ul>
                </li>

                <!-- Report -->
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                            </svg>
                            Report
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'transform rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" class="ml-8 mt-1 space-y-1 text-sm text-gray-600">
                        <li>
                            <a href="/sales_by_date.html" class="block p-2 hover:bg-gray-100 rounded-lg transition">Sales by dates</a>
                        </li>
                        <li>
                            <a href="/report_monthly.html" class="block p-2 hover:bg-gray-100 rounded-lg transition">Monthly sales</a>
                        </li>
                        <li>
                            <a href="/report_daily.html" class="block p-2 hover:bg-gray-100 rounded-lg transition">Daily sales</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <?php include_once ("header.php");?>

            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    </div>
                    
                    <!--First Row-->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <!-- Users Card -->
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-blue-800">Users</h3>
                                    <p class="text-2xl font-bold mt-0 text-blue-600">1,254</p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Categories Card -->
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-green-800">Categories</h3>
                                    <p class="text-2xl font-bold mt-1 text-green-600">42</p>
                                </div>
                                <div class="p-3 rounded-full bg-green-100 text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Companies Card -->
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-purple-800">Companies</h3>
                                    <p class="text-2xl font-bold mt-1 text-purple-600">87</p>
                                </div>
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Products Card -->
                        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-yellow-800">Products</h3>
                                    <p class="text-2xl font-bold mt-1 text-yellow-600">2,458</p>
                                </div>
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sales Card -->
                        <div class="bg-red-50 p-4 rounded-lg border border-red-100">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-red-800">Sales</h3>
                                    <p class="text-2xl font-bold mt-1 text-red-600">5,632</p>
                                </div>
                                <div class="p-3 rounded-full bg-red-100 text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Highest Selling -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 mb-6 mt-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Highest Selling Products</h2>
                        <div class="relative">
                            <select class="appearance-none bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Latest Sales Table -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Latest Sales</h2>
                            <a href="/manage_sale.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <th scope="col" class="px-6 py-3">ID</th>
                                        <th scope="col" class="px-6 py-3">Product Name</th>
                                        <th scope="col" class="px-6 py-3">Date</th>
                                        <th scope="col" class="px-6 py-3">Total Sale</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap text-sm">
                                    <tr>
                                        <td class="px-6 py-4 text-gray-500">#01</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">Demo 1</td>
                                        <td class="px-6 py-4 text-gray-500">2023-06-15</td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱1,250.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 text-gray-500">#02</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">Demo 2</td>
                                        <td class="px-6 py-4 text-gray-500">2023-06-14</td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱980.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recently Added Products Table -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Recently Added Products</h2>
                            <a href="/manage_products.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <th scope="col" class="px-6 py-3">Product</th>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Price</th>
                                        <th scope="col" class="px-6 py-3">Category</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="whitespace-nowrap text-sm">
                                        <td class="px-6 py-4">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="./images/circle.jpg">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">Demo 1</td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱1,299.99</td>
                                        <td class="px-6 py-4 text-gray-500">Finished Goods</td>
                                    </tr>

                                    <tr class="whitespace-nowrap text-sm">
                                        <td class="px-6 py-4">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="./images/circle.jpg">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">Demo 2</td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱899.99</td>
                                        <td class="px-6 py-4 text-gray-500">Work In Progress</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the canvas element
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            // Create the chart
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Demo 1', 'Demo 2', 'Demo 3', 'Demo 4', 'Demo 5', 'Demo 6'],
                    datasets: [{
                        label: 'Total Sales',
                        data: [2300, 1850, 1630, 1400, 1000, 800],
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.raw.toLocaleString();
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
     </script>
</body>
</html>