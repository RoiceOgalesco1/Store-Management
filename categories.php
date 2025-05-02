<?php
$page_title = 'All categories';
require_once('includes/load.php');
// page_require_level(2);

// Pagination variables
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Items per page
$offset = ($current_page - 1) * $per_page;

// Get total count of categories
$total_count = count_by_id('categories')['total'];

// Get paginated categories
$all_categories = find_paginated_categories($per_page, $offset);

$total_pages = ceil($total_count / $per_page);
$start_item = $offset + 1;
$end_item = min($offset + $per_page, $total_count);
?>

<?php include_once ("./pagination.php");?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50" x-data="{ showAddCategory: false }">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Categories</h2>
                        <button @click="showAddCategory = true" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Category
                        </button>
                    </div>
                    
                    <!-- Add Category Popup -->
                    <div x-show="showAddCategory" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" @click.away="showAddCategory = false">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Add New Category</h3>
                                <button @click="showAddCategory = false" class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <form method="post" action="categorie.php">
                                <div class="mb-4">
                                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                    <input type="text" id="categoryName" name="categorie-name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="flex justify-end space-x-3">
                                    <button type="button" @click="showAddCategory = false" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        Cancel
                                    </button>
                                    <button type="submit" name="add_cat" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                                        Save Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Categories Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Categories</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($all_categories as $cat):?>
                                <tr class="whitespace-nowrap text-sm">
                                <td class="px-6 py-4 font-medium text-gray-900"><?php echo count_id();?></td>
                                <td class="px-6 py-4 text-gray-500"><?php echo remove_junk(ucfirst($cat['cname'])); ?></td>
                                    <td class="px-6 py-4 text-gray-500">
                                        <div class="flex space-x-3 text-sm">
                                            <a href="./edit_category.php?id=<?php echo (int)$cat['id'];?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="./delete_category.php?id=<?php echo (int)$cat['id'];?>" class="text-red-600 hover:text-red-900">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
                                <a href="?page=<?php echo $current_page - 1; ?>" class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Previous
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Previous</span>
                            <?php endif; ?>
                            
                            <?php if ($current_page < $total_pages): ?>
                                <a href="?page=<?php echo $current_page + 1; ?>" class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Next
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Next</span>
                            <?php endif; ?>
                        </div>
                    </div> 
                </div>
            </main>
        </div>
    </div>
</body>
</html>