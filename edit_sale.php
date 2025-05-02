<?php
//   $page_title = 'Edit sale';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(3);
?>
<?php
// $sale = find_by_id('sales',(int)$_GET['id']);
// if(!$sale){
//   $session->msg("d","Missing product id.");
//   redirect('sales.php');
// }
?>
<?php //$product = find_by_id_product('products',$sale['product_id']); ?>
<?php

//   if(isset($_POST['update_sale'])){
//     $req_fields = array('title','quantity','price','total', 'date' );
//     validate_fields($req_fields);
//         if(empty($errors)){
//           $p_id      = $db->escape((int)$product['pid']);
//           $s_qty     = $db->escape((int)$_POST['quantity']);
//           $s_total   = $db->escape($_POST['total']);
//           $date      = $db->escape($_POST['date']);
//           $s_date    = date("Y-m-d", strtotime($date));

//           $sql  = "UPDATE sales SET";
//           $sql .= " product_id= '{$p_id}',qty='{$s_qty}',price='{$s_total}',date='{$s_date}'";
//           $sql .= " WHERE id ='{$sale['id']}'";
//           $result = $db->query($sql);
//           if( $result && $db->affected_rows() === 1){
//                     update_product_qty($s_qty,$p_id);
//                     $session->msg('s',"Sale updated.");
//                     redirect('edit_sale.php?id='.$sale['id'], false);
//                   } else {
//                     $session->msg('d',' Sorry failed to updated!');
//                     redirect('sales.php', false);
//                   }
//         } else {
//            $session->msg("d", $errors);
//            redirect('edit_sale.php?id='.(int)$sale['id'],false);
//         }
//   }

?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-4 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100 w-full">
                    <!-- Title and Button in same row -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Edit Sales</h1>
                        <!-- Show All Sales Button -->
                        <a href="/manage_sale.html" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                            Show All Sales
                        </a>
                    </div>
                    
                    <!-- Editable Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th class="px-6 py-3">Product Title</th>
                                    <th class="px-6 py-3">Qty</th>
                                    <th class="px-6 py-3">Price</th>
                                    <th class="px-6 py-3">Total</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <form method="post"action="edit_sale.php">
                                        <td id="s_name" class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" id="sug_input" name="title" value="Premium Headphones" class="border rounded px-2 py-1 w-full">
                                        </td>
                                        <td id="s_qty"class="px-6 py-4 whitespace-nowrap">
                                            <input type="number" name="quantity"value="2" class="border rounded px-2 py-1 w-20">
                                        </td>
                                        <td id="s_price"class="px-6 py-4 whitespace-nowrap">
                                            <input type="number" name="price"value="99.99" class="border rounded px-2 py-1 w-24">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="number" name="total"value="199.98" class="border rounded px-2 py-1 w-24">
                                        </td>
                                        <td id="s_date"class="px-6 py-4 whitespace-nowrap">
                                            <input type="date" name="date"value="2023-05-15" class="border rounded px-2 py-1">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button type="submit" name="update_sale"class="bg-green-600 hover:bg-green-700 text-white font-medium py-1 px-3 rounded transition">
                                                Update
                                            </button>
                                        </td>
                                    </form>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>