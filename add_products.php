<?php
//   $page_title = 'Add Product';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//   page_require_level(2);
//   $all_categories = find_all('categories');
//   $all_companies = find_all('companies');
//   $all_photo = find_all('media');
?>
<?php
//  if(isset($_POST['add_product'])){
//    $req_fields = array('product-title','onumber','brand','location','shipnumber','colour','dreceived','product-categorie','product-quantity','buying-price', 'saleing-price' );
//    validate_fields($req_fields);
//    if(empty($errors)){
//      $p_name  = remove_junk($db->escape($_POST['product-title']));
//      $p_onumber  = remove_junk($db->escape($_POST['onumber']));
//      $p_brand  = remove_junk($db->escape($_POST['brand']));
//      $p_location  = remove_junk($db->escape($_POST['location']));
//      $p_shipnumber  = remove_junk($db->escape($_POST['shipnumber']));
//      $p_colour  = remove_junk($db->escape($_POST['colour']));
//      $p_dreceived  = remove_junk($db->escape($_POST['dreceived']));
//      $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
//      $p_branch   = remove_junk($db->escape($_POST['product-branch']));
//      $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
//      $p_buy   = remove_junk($db->escape($_POST['buying-price']));
//      $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
//      if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
//        $media_id = '0';
//      } else {
//        $media_id = remove_junk($db->escape($_POST['product-photo']));
//      }
//      $date    = make_date();
//      $query  = "INSERT INTO products (";
//      $query .=" name,onumber,brand,location,shipnumber,colour,dreceived,quantity,buy_price,sale_price,categorie_id,media_id,date,branch_id";
//      $query .=") VALUES (";
//      $query .=" '{$p_name}','{$p_onumber}','{$p_brand}','{$p_location}','{$p_shipnumber}','{$p_colour}','{$p_dreceived}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}', '{$p_branch}'";
//      $query .=")";
//      $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
//      if($db->query($query)){
//        $session->msg('s',"Product added ");

//        redirect('add_product.php', false);
//      } else {
//        $session->msg('d',' Sorry failed to added!');
//        redirect('product.php', false);
//      }

//    } else{
//      $session->msg("d", $errors);
//      redirect('add_product.php',false);
//    }

//  }

?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-4 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100">
                    <!-- Add Product Form Section -->
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Add New Product</h2>
                            <a href="./manage_products.php" class="text-xs text-gray-600 hover:text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Back to Products
                            </a>
                        </div>
                        
                        <!-- Product Form -->
                        <form method="post" action="add_products.php" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Company Selection -->
                                <div>
                                    <label for="company" class="block text-xs font-medium text-gray-700 mb-1">Company</label>
                                    <select id="company" name="product-branch" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Select Company</option>
                                        <option value="rimadesio">Rimadesio Inc.</option>
                                        <option value="bespoke">Bespoke Inc.</option>
                                        <option value="supersalone">Supersalone</option>
                                        <option value="frette">Frette</option>
                                        <option value="chi-cha">Chi Cha</option>
                                    </select>
                                </div>

                                <!-- Product Description -->
                                <div>
                                    <label for="description" name="product-title" class="block text-xs font-medium text-gray-700 mb-1">Product Description</label>
                                    <input type="text" id="description" name="description" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Order Number -->
                                <div>
                                    <label for="order-number" name="onumber"class="block text-xs font-medium text-gray-700 mb-1">Order Number</label>
                                    <input type="text" id="order-number" name="order-number" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Category Selection -->
                                <div>
                                    <label for="category" class="block text-xs font-medium text-gray-700 mb-1">Product Category</label>
                                    <select id="category" name="product-categorie" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Select Category</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="bedroom">Bedroom</option>
                                        <option value="dining">Dining</option>
                                        <option value="living">Living Room</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>

                                <!-- Photo Selection -->
                                <div>
                                    <label for="photo" class="block text-xs font-medium text-gray-700 mb-1">Product Photo</label>
                                    <select id="photo" name="product-photo" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Select Photo</option>
                                        <option value="photo1">Photo 1</option>
                                        <option value="photo2">Photo 2</option>
                                        <option value="photo3">Photo 3</option>
                                        <option value="photo4">Photo 4</option>
                                    </select>
                                </div>

                                <!-- Brand -->
                                <div>
                                    <label for="brand" class="block text-xs font-medium text-gray-700 mb-1">Brand</label>
                                    <input type="text" id="brand" name="brand" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Location -->
                                <div>
                                    <label for="location" class="block text-xs font-medium text-gray-700 mb-1">Location</label>
                                    <input type="text" id="location" name="location" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Shipment Number -->
                                <div>
                                    <label for="shipment" class="block text-xs font-medium text-gray-700 mb-1">Shipment Number</label>
                                    <input type="text" id="shipment" name="shipnumber" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Color -->
                                <div>
                                    <label for="color" class="block text-xs font-medium text-gray-700 mb-1">Color</label>
                                    <input type="text" id="color" name="colour" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Date -->
                                <div>
                                    <label for="date" class="block text-xs font-medium text-gray-700 mb-1">Date Received </label>
                                    <input type="date" id="date" name="dreceived" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Size -->
                                <div>
                                    <label for="size" class="block text-xs font-medium text-gray-700 mb-1">Size</label>
                                    <input type="text" id="size" name="size" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Quantity -->
                                <div>
                                    <label for="quantity" class="block text-xs font-medium text-gray-700 mb-1">Product Quantity</label>
                                    <input type="number" id="quantity" name="product-quantity" min="1" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Cost Price -->
                                <div>
                                    <label for="cost-price" class="block text-xs font-medium text-gray-700 mb-1">Cost Price (₱)</label>
                                    <input type="number" id="cost-price" name="buying-price" min="0" step="1" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- Retail Price -->
                                <div>
                                    <label for="retail-price" class="block text-xs font-medium text-gray-700 mb-1">Retail Price (₱)</label>
                                    <input type="number" id="retail-price" name="saleing-price" min="0" step="s1" class="w-full text-sm border border-gray-300 rounded px-2 py-1.5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit" name="add_product" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded text-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                    Add Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>