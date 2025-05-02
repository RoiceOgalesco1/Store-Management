<?php
//   $page_title = 'Edit product';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(2);
// ?>
// <?php
// $product = find_by_id_product('products',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');
// if(!$product){
//   $session->msg("d","Missing product id.");
//   redirect('product.php');
// }
?>
<?php
//  if(isset($_POST['product'])){
//     $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
//     validate_fields($req_fields);

//    if(empty($errors)){
//        $p_name  = remove_junk($db->escape($_POST['product-title']));
//        $p_cat   = (int)$_POST['product-categorie'];
//        $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
//        $p_buy   = remove_junk($db->escape($_POST['buying-price']));
//        $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
//        if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
//          $media_id = '0';
//        } else {
//          $media_id = remove_junk($db->escape($_POST['product-photo']));
//        }
//        $query   = "UPDATE products SET";
//        $query  .=" name ='{$p_name}', quantity ='{$p_qty}',";
//        $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
//        $query  .=" WHERE pid ='{$product['pid']}'";
//        $result = $db->query($query);
//                if($result && $db->affected_rows() === 1){
//                  $session->msg('s',"Product updated ");
//                  redirect('product.php', false);
//                } else {
//                  $session->msg('d',' Sorry failed to updated!');
//                  redirect('edit_product.php?id='.$product['id'], false);
//                }

//    } else{
//        $session->msg("d", $errors);
//        redirect('edit_product.php?id='.$product['id'], false);
//    }

//  }

?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-4 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100 w-full">
                    <h2 class="text-xl font-semibold mb-5 text-gray-800 border-b pb-3">Edit Product</h2>
                    
                    <form method="post" action="edit_product.phps">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Left Column -->
                            <div class="space-y-4">
                                <!-- Product Description -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Description</label>
                                    <input type="text" name="product-title"class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                
                                <!-- Category Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                    <select name="product-categorie"class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option>Select Category</option>
                                        <option>Electronics</option>
                                        <option>Clothing</option>
                                        <option>Groceries</option>
                                    </select>
                                </div>
                                
                                <!-- Brand Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                    <select name="product_photo"class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option>Select Brand</option>
                                        <option>Brand A</option>
                                        <option>Brand B</option>
                                        <option>Brand C</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="space-y-4">
                                <!-- Quantity -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                    <input type="number" name="product-quantity"class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                
                                <!-- Buying Price -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Buying Price</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-sm">₱</span>
                                        <input type="number" name="buying-price" step="1" class="w-full pl-8 pr-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                </div>
                                
                                <!-- Selling Price -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Selling Price</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-sm">₱</span>
                                        <input type="number" name="saleing-price"step="1" class="w-full pl-8 pr-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-2 border-t pt-4">
                            <a href="./manage_products.php" class="px-4 py-1.5 text-sm border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition inline-block text-center">
                                Cancel
                            </a>
                            <button type="submit" name="product" class="px-4 py-1.5 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition">
                                Update Product
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>
</body>
</html>