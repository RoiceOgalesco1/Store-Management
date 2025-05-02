<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
// page_require_level(2);
$products = join_product_table();
$all_companies = find_all('companies');
?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>

<script type="text/javascript">
  function submitForm() {
    document.forms['companyForm'].submit();
  }
</script>

<?php
require_once('databases.php');

// Default query to fetch all products
$query = "SELECT * FROM products AS p 
          LEFT JOIN categories AS c ON p.categorie_id = c.id 
          LEFT JOIN companies AS cm ON p.branch_id = cm.id 
          LEFT JOIN media AS images ON p.media_id = images.id 
          WHERE p.ar_id='0'";

// Modify the query if a company is selected
if (isset($_POST['search']) && !empty($_POST['search'])) {
  $search = (int)$_POST['search']; // Ensure the search value is an integer
  $query .= " AND cm.id='$search'";
}

$result = mysqli_query($conn, $query);

// Default query to fetch all products with pagination
$per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $per_page;

$query = "SELECT * FROM products AS p 
          LEFT JOIN categories AS c ON p.categorie_id = c.id 
          LEFT JOIN companies AS cm ON p.branch_id = cm.id 
          LEFT JOIN media AS images ON p.media_id = images.id 
          WHERE p.ar_id='0'";

// Modify the query if a company is selected
if (isset($_POST['search']) && !empty($_POST['search'])) {
  $search = (int)$_POST['search'];
  $query .= " AND cm.id='$search'";
}

// Add pagination to the query
$query .= " LIMIT $offset, $per_page";

$result = mysqli_query($conn, $query);


?>

            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <!-- Products Table Section -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Products</h2>
                            <a href="add_products.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md transition flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>  
                                Add New Product
                            </a>
                        </div>
                        
                        <!-- Search and Filter -->
                        <div class="mb-4 flex justify-between items-center">
                            <div class="relative w-64">
                                <input type="text" placeholder="Search products..." class="w-full pl-8 pr-3 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">Filter:</span>
                                <form method="post" name="companyForm">
                                    <select class="border border-gray-300 rounded-md px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" name="search" onchange="submitForm()">
                                        <option value="">All Companies</option>
                                        <?php foreach ($all_companies as $com): ?>
                                            <option value="<?php echo (int)$com['id'] ?>" <?php echo (isset($_POST['search']) && $_POST['search'] == $com['id']) ? 'selected' : ''; ?>>
                                                <?php echo $com['bname'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Products Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <?php
                                if ($result && mysqli_num_rows($result) > 0) {
                                    echo
                                    '<thead class="bg-gray-50">
                                        <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <th scope="col" class="px-6 py-3">Photo</th>
                                            <th scope="col" class="px-6 py-3">Product Title</th>
                                            <th scope="col" class="px-6 py-3">Categories</th>
                                            <th scope="col" class="px-6 py-3">In-Stock</th>
                                            <th scope="col" class="px-6 py-3">Buying Price</th>
                                            <th scope="col" class="px-6 py-3">Selling Price</th>
                                            <th scope="col" class="px-6 py-3">Product Added</th>
                                            <th scope="col" class="px-6 py-3">Branch</th>
                                            <th scope="col" class="px-6 py-3">Action</th>
                                        </tr>
                                    </thead>';
                                } else {
                                    echo '<h2 class="text-danger">Data not found</h2>';
                                }
                                ?>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($result as $product): ?>
                                        <?php if ($product['ar_id'] === '0'): ?>
                                            <tr class="whitespace-nowrap text-sm">
                                                <td class="px-6 py-4">
                                                    <div class="h-8 w-8 rounded-full overflow-hidden">
                                                        <?php if ($product['media_id'] === '0'): ?>
                                                            <img src="uploads/products/no_image.png"class="h-full w-full object-cover">
                                                        <?php else: ?>
                                                            <img src="uploads/products/<?php echo $product['file_name']; ?>" class="h-full w-full object-cover">
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900"><?php echo remove_junk($product['name']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk($product['cname']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk($product['quantity']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk($product['buy_price']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk($product['sale_price']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo read_date($product['date']); ?></td>
                                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk($product['bname']); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="edit_product.php?id=<?php echo (int)$product['pid']; ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <button class="text-red-600 hover:text-red-900 ml-3">Delete</button>
                                                </td>
                                                
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-sm text-gray-500">
                                <?php
                                $total = mysqli_num_rows($result);
                                $per_page = 10; // Items per page
                                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $offset = ($current_page - 1) * $per_page;
                                $total_pages = ceil($total / $per_page);
                                
                                $start_item = $offset + 1;
                                $end_item = min($offset + $per_page, $total);
                                
                                echo "Showing <span class='font-medium'>$start_item</span> to <span class='font-medium'>$end_item</span> of <span class='font-medium'>$total</span> entries";
                                ?>
                            </div>
                            <div class="flex space-x-2 text-sm font-medium text-gray-700 bg-white">
                                <?php if ($current_page > 1): ?>
                                    <a href="?page=<?php echo $current_page - 1; ?><?php echo isset($_POST['search']) ? '&search='.(int)$_POST['search'] : ''; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">
                                        Previous
                                    </a>
                                <?php else: ?>
                                    <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-400 cursor-not-allowed">Previous</span>
                                <?php endif; ?>
                                
                                <?php if ($current_page < $total_pages): ?>
                                    <a href="?page=<?php echo $current_page + 1; ?><?php echo isset($_POST['search']) ? '&search='.(int)$_POST['search'] : ''; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">
                                        Next
                                    </a>
                                <?php else: ?>
                                    <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-400 cursor-not-allowed">Next</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>