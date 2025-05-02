<?php
//   $page_title = 'Edit categorie';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//   page_require_level(1);
?>
<?php
//   //Display all catgories.
//   $categorie = find_by_id('categories',(int)$_GET['id']);
//   if(!$categorie){
//     $session->msg("d","Missing categorie id.");
//     redirect('categorie.php');
//   }
?>

<?php
// if(isset($_POST['edit_cat'])){
//   $req_field = array('categorie-name');
//   validate_fields($req_field);
//   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
//   if(empty($errors)){
//         $sql = "UPDATE categories SET cname='{$cat_name}'";
//        $sql .= " WHERE id='{$categorie['id']}'";
//      $result = $db->query($sql);
//      if($result && $db->affected_rows() === 1) {
//        $session->msg("s", "Successfully updated Categorie");
//        redirect('categorie.php',false);
//      } else {
//        $session->msg("d", "Sorry! Failed to Update");
//        redirect('categorie.php',false);
//      }
//   } else {
//     $session->msg("d", $errors);
//     redirect('categorie.php',false);
//   }
// }
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 max-w-md mx-auto">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Category</h2>
                    
                    <form method="post" action="edit_category.php">
                        <div class="space-y-4">
                            <div>
                                <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                                <input type="text" name="categorie-name"id="categoryName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div class="text-right">
                                <button type="submit" name="edit_cat"class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
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