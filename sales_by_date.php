<?php
$page_title = 'Sale Report';
  require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(3);
?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Sales Report Generator</h2>
                    
                    <form action="sale_report_process.php" method="post">
                    <!-- Date Range Selector -->
                        <div class="mb-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                                    <input type="date" id="start-date" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="end-date" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                                    <input type="date" id="end-date" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                            
                            <button id="generate-report" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Generate Report
                            </button>
                        </div>
                    </form>
                </div>
            </main>
            
        </div>
    </div>
</body>
</html>