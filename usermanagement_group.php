<?php
$page_title = 'All Group';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
// page_require_level(1);

$status_filter = isset($_GET['status']) ? $_GET['status'] : 'all';
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Items per page
$offset = ($current_page - 1) * $per_page;

if ($status_filter === 'active') {
    $total_count = count_by_id('user_groups', 'id', "WHERE group_status = '1'")['total'];
    $all_groups = find_by_sql("SELECT * FROM user_groups WHERE group_status = '1' LIMIT $per_page OFFSET $offset");
} elseif ($status_filter === 'inactive') {
    $total_count = count_by_id('user_groups', 'id', "WHERE group_status = '0'")['total'];
    $all_groups = find_by_sql("SELECT * FROM user_groups WHERE group_status = '0' LIMIT $per_page OFFSET $offset");
} else {
    $total_count = count_by_id('user_groups')['total'];
    $all_groups = find_by_sql("SELECT * FROM user_groups LIMIT $per_page OFFSET $offset");
}

$total_pages = ceil($total_count / $per_page);
$start_item = $offset + 1;
$end_item = min($offset + $per_page, $total_count);
?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <!-- User Management Table Section -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">User Management</h2>
                            <a href="./add_group.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md transition flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Add New Group
                            </a>
                        </div>
                        
                        <!-- Search Bar -->
                        <div class="mb-4 flex justify-between items-center">
                            <div class="relative w-64">
                                <input type="text" placeholder="Search groups..." class="w-full pl-8 pr-3 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">Filter:</span>
                                <form method="get" action="" class="m-0">
                                    <input type="hidden" name="page" value="1">
                                    <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                        <option value="all" <?php echo $status_filter === 'all' ? 'selected' : ''; ?>>All Status</option>
                                        <option value="active" <?php echo $status_filter === 'active' ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo $status_filter === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        
                        <div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <th scope="col" class="px-6 py-3">ID</th>
                                        <th scope="col" class="px-6 py-3">Group Name</th>
                                        <th scope="col" class="px-6 py-3">Group Level</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach($all_groups as $a_group): ?>
                                    <tr class="whitespace-nowrap text-sm">
                                        <td class="px-6 py-4 text-gray-500"><?php echo $a_group['id'];?></td>
                                        <td class="px-6 py-4 font-medium text-gray-900"><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
                                        <td class="px-6 py-4 text-gray-500"><?php echo remove_junk(ucwords($a_group['group_level']))?></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if($a_group['group_status'] === '1'): ?>
                                            <span class="px-1.5 py-0.5 inline-flex text-xs leading-4 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            <?php else: ?>
                                            <span class="px-1.5 py-0.5 inline-flex text-xs leading-4 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                                            <?php endif;?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="./edit_group.php?id=<?php echo (int)$a_group['id'];?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="./delete_group.php?id=<?php echo (int)$a_group['id'];?>" class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium"><?php echo $start_item; ?></span> to <span class="font-medium"><?php echo $end_item; ?></span> of <span class="font-medium"><?php echo $total_count; ?></span> entries
                            </div>
                            <div class="flex space-x-2">
                                <?php if ($current_page > 1): ?>
                                    <a href="?page=<?php echo $current_page - 1; ?>&status=<?php echo $status_filter; ?>" class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        Previous
                                    </a>
                                <?php else: ?>
                                    <span class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Previous</span>
                                <?php endif; ?>
                                
                                <?php if ($current_page < $total_pages): ?>
                                    <a href="?page=<?php echo $current_page + 1; ?>&status=<?php echo $status_filter; ?>" class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        Next
                                    </a>
                                <?php else: ?>
                                    <span class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Next</span>
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