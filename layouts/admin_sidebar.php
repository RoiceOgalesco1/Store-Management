<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <title>Inventory System</title>
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
                    <a href="./admin_dashboard.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <!-- User Management -->
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.025-3.5 4 4 0 011.025-3.5 4 4 0 011.025 3.5A6.97 6.97 0 0013 16c0 .34.024.673.07 1h-2.14zM9 13a4 4 0 01-4-4 4 4 0 014-4 4 4 0 014 4 4 4 0 01-4 4z" />
                            </svg>
                            User Management
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'transform rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" class="ml-8 mt-1 space-y-1 text-sm text-gray-600 ">
                        <li>
                            <a href="./usermanagement_group.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Manage Groups</a>
                        </li>
                        <li>
                            <a href="./usermanagement_user.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Manage Users</a>
                        </li>
                    </ul>
                </li>

                <!-- Categories -->
                <li>
                    <a href="./categories.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        Categories
                    </a>
                </li>

                <!-- Products -->
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                            </svg>
                            Products
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'transform rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" class="ml-8 mt-1 space-y-1 text-sm text-gray-600 ">
                        <li>
                            <a href="./manage_products.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Manage Products</a>
                        </li>
                        <li>
                            <a href="./add_products.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Add Products</a>
                        </li>
                    </ul>
                </li>

                <!-- Media Files -->
                <li>
                    <a href="./media.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                        Media Files
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
                            <a href="./manage_sale.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Manage Sale</a>
                        </li>
                        <li>
                            <a href="./add_sale.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Add Sale</a>
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
                            <a href="./sales_by_date.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Sales by dates</a>
                        </li>
                        <li>
                            <a href="./report_monthly.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Monthly sales</a>
                        </li>
                        <li>
                            <a href="./report_daily.php" class="block p-2 hover:bg-gray-100 rounded-lg transition">Daily sales</a>
                        </li>
                    </ul>
                </li>

                <!-- Brand -->
                <li>
                    <a href="./brand.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Brand
                    </a>
                </li>

                <!-- Stock Transfer -->
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-1a1 1 0 011-1h2a1 1 0 011 1v1a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1V5a1 1 0 00-1-1H3z" />
                            </svg>
                            Stock Transfer
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="{ 'transform rotate-90': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul x-show="open" class="ml-8 mt-1 space-y-1">
                        <li>
                            <a href="#" class="block p-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition">Stock Transfer Out</a>
                        </li>
                        <li>
                            <a href="#" class="block p-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition">Stock Transfer In</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>