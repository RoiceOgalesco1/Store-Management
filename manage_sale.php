<?php
$page_title = 'All sale';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
$all_companies = find_all('companies');
// page_require_level(2);

// Pagination variables
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Items per page
$offset = ($current_page - 1) * $per_page;

require_once('databases.php');

// Base query
$query = "SELECT s.id, s.qty, s.price, s.date, p.name, cm.bname 
          FROM sales s 
          LEFT JOIN products p ON s.product_id = p.pid
          LEFT JOIN companies cm ON p.branch_id = cm.id  
          WHERE p.ar_id='0'";

// Count query for total records
$count_query = "SELECT COUNT(*) AS total 
                FROM sales s 
                LEFT JOIN products p ON s.product_id = p.pid
                WHERE p.ar_id='0'";

// Modify queries if search is applied
if (isset($_POST['submit'])) {
    $search = (int)$_POST['search'];
    $query .= " AND p.branch_id = '$search'";
    $count_query .= " AND p.branch_id = '$search'";
}

// Get total count
$count_result = mysqli_query($conn, $count_query);
$total_data = mysqli_fetch_assoc($count_result);
$total_count = $total_data['total'];
$total_pages = ceil($total_count / $per_page);

// Add pagination to main query
$query .= " LIMIT $per_page OFFSET $offset";
$result = mysqli_query($conn, $query);

$start_item = $offset + 1;
$end_item = min($offset + $per_page, $total_count);
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Manage Sales</h2>
                        <div class="flex space-x-3">
                            <button onclick="window.location.href='./add_sale.php'" class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                                Add Sale
                            </button>
                            
                            <!-- Search -->
                            <form method="post" class="flex">
                                <select name="search" class="border border-gray-300 rounded-l-md px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                                    <option value="">Select Company</option>
                                    <?php foreach ($all_companies as $com): ?>
                                        <option value="<?php echo (int)$com['id'] ?>" <?php echo (isset($_POST['search']) && $_POST['search'] == $com['id']) ? 'selected' : ''; ?>>
                                            <?php echo $com['bname'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" name="submit" class="px-3 py-1.5 bg-gray-100 border border-l-0 border-gray-300 rounded-r-md hover:bg-gray-200 transition text-sm">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
            
                    <!-- Sales Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> 
                                    <th class="px-6 py-3">ID</th>
                                    <th class="px-6 py-3">Product Name</th>
                                    <th class="px-6 py-3">Quantity</th>
                                    <th class="px-6 py-3">Total</th>
                                    <th class="px-6 py-3">Branch</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php while($sales = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo count_id(); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($sales['name']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo (int)$sales['qty']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($sales['price']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($sales['bname']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $sales['date']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="./edit_sale.php?id=<?php echo (int)$sales['id']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                        <a href="./delete_sales.php?id=<?php echo (int)$sales['id']; ?>" class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium"><?php echo $start_item; ?></span> to <span class="font-medium"><?php echo $end_item; ?></span> of <span class="font-medium"><?php echo $total_count; ?></span> entries
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
            </main>
        </div>
    </div>
</body>
</html>