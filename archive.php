<?php
$page_title = 'All Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
// page_require_level(2);

// Pagination variables
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Items per page
$offset = ($current_page - 1) * $per_page;

// Get paginated archived products
$products = find_paginated_archived_products($per_page, $offset);
$total_count = count_archived_products();
$total_pages = ceil($total_count / $per_page);
$start_item = $offset + 1;
$end_item = min($offset + $per_page, $total_count);
?>
<?php include_once ("./pagination.php");?>
<?php include_once("./layouts/admin_sidebar.php"); ?>
<?php include_once("./layouts/header.php"); ?>
            <!-- Dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Archive</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th scope="col" class="px-6 py-3">Photo</th>
                                    <th scope="col" class="px-6 py-3">Product Title</th>
                                    <th scope="col" class="px-6 py-3">Categories</th>
                                    <th scope="col" class="px-6 py-3">In-Stock</th>
                                    <th scope="col" class="px-6 py-3">Buying Price</th>
                                    <th scope="col" class="px-6 py-3">Selling Price</th>
                                    <th scope="col" class="px-6 py-3">Product Added</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($products as $product): ?>
                                    <?php if ($product['ar_id'] === '1'): ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <?php if ($product['media_id'] === '0'): ?>
                                                        <img class="h-10 w-10 rounded-full" src="uploads/products/no_image.png">
                                                    <?php else: ?>
                                                        <img class="h-10 w-10 rounded-full" src="uploads/products/<?php echo $product['image']; ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($product['name']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($product['categorie']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($product['quantity']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($product['buy_price']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo remove_junk($product['sale_price']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo read_date($product['date']); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button onclick="openEditPopup('<?php echo remove_junk($product['name']); ?>', '<?php echo remove_junk($product['categorie']); ?>', '<?php echo remove_junk($product['quantity']); ?>', '<?php echo remove_junk($product['buy_price']); ?>', '<?php echo remove_junk($product['sale_price']); ?>', '<?php echo read_date($product['date']); ?>', '<?php echo ($product['media_id'] === '0') ? 'uploads/products/no_image.png' : 'uploads/products/'.$product['image']; ?>')" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
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
            
            <!-- Edit Product Popup -->
            <div id="editPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full">
                            <img id="popupProductImage" class="h-full w-full rounded-full" src="">
                        </div>
                        <h3 id="popupProductName" class="text-lg leading-6 font-medium text-gray-900 mt-2">Product Name</h3>
                        
                        <div class="mt-4 px-7 py-3 text-sm text-left">
                            <div class="flex items-center mb-3">
                                <label class="w-1/3 font-medium text-gray-700">Category:</label>
                                <p id="popupCategory" class="w-2/3 text-gray-500"></p>
                            </div>
                            <div class="flex items-center mb-3">
                                <label class="w-1/3 font-medium text-gray-700">In-Stock:</label>
                                <p id="popupInStock" class="w-2/3 text-gray-500"></p>
                            </div>
                            <div class="flex items-center mb-3">
                                <label class="w-1/3 font-medium text-gray-700">Buying Price:</label>
                                <p id="popupBuyingPrice" class="w-2/3 text-gray-500"></p>
                            </div>
                            <div class="flex items-center mb-3">
                                <label class="w-1/3 font-medium text-gray-700">Selling Price:</label>
                                <p id="popupSellingPrice" class="w-2/3 text-gray-500"></p>
                            </div>
                            <div class="flex items-center mb-4">
                                <label class="w-1/3 font-medium text-gray-700">Product Added:</label>
                                <p id="popupProductAdded" class="w-2/3 text-gray-500">  </p>
                            </div>
                        </div>
                        
                        <div class="items-center px-4 py-3 text-base font-medium focus:outline-none focus:ring-2">
                            <button id="activateBtn" class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700 focus:ring-green-300">
                                Activate
                            </button>
                            <button onclick="closeEditPopup()" class="ml-3 px-4 py-2 bg-gray-200 text-gray-800 rounded-md shadow-sm hover:bg-gray-300 focus:ring-gray-300">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <script>
        function openEditPopup(name, category, inStock, buyingPrice, sellingPrice, productAdded, imageUrl) {
            document.getElementById('popupProductName').textContent = name;
            document.getElementById('popupCategory').textContent = category;
            document.getElementById('popupInStock').textContent = inStock;
            document.getElementById('popupBuyingPrice').textContent = '₱' + buyingPrice;
            document.getElementById('popupSellingPrice').textContent = '₱' + sellingPrice;
            document.getElementById('popupProductAdded').textContent = productAdded;
            document.getElementById('popupProductImage').src = imageUrl;
            
            document.getElementById('editPopup').classList.remove('hidden');
        }
        
        function closeEditPopup() {
            document.getElementById('editPopup').classList.add('hidden');
        }
        
        // Close popup if clicked outside
        window.onclick = function(event) {
            const popup = document.getElementById('editPopup');
            if (event.target === popup) {
                closeEditPopup();
            }
        }
        
        // Activate button
        document.getElementById('activateBtn').addEventListener('click', function() {
            alert('Product activated!');
            closeEditPopup();
        });
    </script>
</body>
</html>