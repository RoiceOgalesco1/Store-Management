<?php
//   $page_title = 'Edit companies';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//   page_require_level(1);
// ?>
// <?php
//   //Display all catgories.
//   $companies = find_by_id('companies',(int)$_GET['id']);
//   if(!$companies){
//     $session->msg("d","Missing companies id.");
//     redirect('companies.php');
//   }
?>

<?php
// if(isset($_POST['edit_com'])){
//   $req_field = array('companies-bname');
//   validate_fields($req_field);
//   $com_bname = remove_junk($db->escape($_POST['companies-bname']));
//   if(empty($errors)){
//         $sql = "UPDATE companies SET bname='{$com_bname}'";
//        $sql .= " WHERE id='{$companies['id']}'";
//      $result = $db->query($sql);
//      if($result && $db->affected_rows() === 1) {
//        $session->msg("s", "Successfully updated Companies");
//        redirect('companies.php',false);
//      } else {
//        $session->msg("d", "Sorry! Failed to Update");
//        redirect('companies.php',false);
//      }
//   } else {
//     $session->msg("d", $errors);
//     redirect('companies.php',false);
//   }
// }
?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 max-w-md mx-auto">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Brand</h2>
                    
                    <form method="post" action="edit_brand.php">
                        <div class="space-y-4">
                            <div>
                                <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Brand Name</label>
                                <input type="text" id="categoryName" name="companies-bname"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div class="text-right">
                                <button type="submit" name="edit_com" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>