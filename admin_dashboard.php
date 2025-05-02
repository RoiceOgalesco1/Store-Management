<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
// page_require_level(1);

$c_categorie     = count_by_id('categories');
$c_companies     = count_by_id('companies');
$c_sale          = count_by_id('sales');
$c_user          = count_by_id('users');
$products_sold   = find_highest_selling_product('10');
$recent_products = find_recent_product_added('5');
$recents_products = find_recent_product_addeds('5');
$recent_sales    = find_recent_sale_added('5');

// Count products with ar_id = 0
require_once "databases.php";
$sql = "SELECT * FROM products WHERE ar_id = '0'";
$sql_run = mysqli_query($conn, $sql);
$product_count = mysqli_num_rows($sql_run);
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    </div>
                    
                    <!--First Row-->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <!-- Users Card -->
                        <a href="usermanagement_user.php">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 hover:bg-blue-100 transition-colors">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-blue-800">Users</h3>
                                    <p class="text-2xl font-bold mt-0 text-blue-600"><?php echo $c_user['total']; ?></p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </a>
                        
                        <!-- Categories Card -->
                        <a href="categories.php">
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100 hover:bg-green-100 transition-colors">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-green-800">Categories</h3>
                                    <p class="text-2xl font-bold mt-1 text-green-600"><?php echo $c_categorie['total']; ?></p>
                                </div>
                                <div class="p-3 rounded-full bg-green-100 text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </a>
                        
                        <!-- Companies Card -->
                        <a href="brand.php">
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100 hover:bg-purple-100 transition-colors">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-purple-800">Companies</h3>
                                    <p class="text-2xl font-bold mt-1 text-purple-600"><?php echo $c_companies['total']; ?></p>
                                </div>
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    <!-- Second Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Products Card -->
                        <a href="manage_products.php">
                        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100 hover:bg-yellow-100 transition-colors">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-yellow-800">Products</h3>
                                    <p class="text-2xl font-bold mt-1 text-yellow-600"><?php echo $product_count; ?></p>
                                </div>
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </a>
                        
                        <!-- Sales Card -->
                        <a href="manage_sale.php">
                        <div class="bg-red-50 p-4 rounded-lg border border-red-100 hover:bg-red-100 transition-colors">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-red-800">Sales</h3>
                                    <p class="text-2xl font-bold mt-1 text-red-600"><?php echo $c_sale['total']; ?></p>
                                </div>
                                <div class="p-3 rounded-full bg-red-100 text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                <!-- Highest Selling -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 mb-6 mt-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Highest Selling Products</h2>
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
                            <a href="./manage_sale.php" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
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
                                    <?php foreach ($recent_sales as $recent_sale): ?>
                                    <tr>
                                        <td class="px-6 py-4 text-gray-500"><?php echo count_id(); ?></td>
                                        <td class="px-6 py-4 font-medium text-gray-900"><?php echo remove_junk(first_character($recent_sale['name'])); ?></td>
                                        <td class="px-6 py-4 text-gray-500"><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recently Added Products Table -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Recently Added Products</h2>
                            <a href="./manage_products.php" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
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
                                    <?php foreach ($recents_products as $recent_product): ?>
                                    <tr class="whitespace-nowrap text-sm">
                                        <td class="px-6 py-4">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <?php if($recent_product['media_id'] === '0'): ?>
                                                    <img class="h-10 w-10 rounded-full object-cover" src="uploads/products/no_image.png">
                                                <?php else: ?>
                                                    <img class="h-10 w-10 rounded-full object-cover" src="uploads/products/<?php echo $recent_product['image']; ?>">
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900"><?php echo remove_junk(first_character($recent_product['name'])); ?></td>
                                        <td class="px-6 py-4 text-gray-900 font-semibold">₱<?php echo (int)$recent_product['sale_price']; ?></td>
                                        <td class="px-6 py-4 text-gray-500"><?php echo remove_junk(first_character($recent_product['categorie'])); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
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
            
            // Prepare data from PHP
            const productsSold = <?php echo json_encode($products_sold ?? []); ?>;
            
            if (Array.isArray(productsSold)) {
                const labels = productsSold.map(product => product.name);
                const data = productsSold.map(product => parseInt(product.totalQty));

                // Create the chart
                const salesChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Quantity Sold',
                            data: data,
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
                                title: {
                                    display: true,
                                    text: 'Total Quantity Sold'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Product Name'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            } else {
                console.error('productsSold is not an array:', productsSold);
            }
        });
     </script>
</body>
</html>