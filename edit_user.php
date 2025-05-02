<?php
//   $page_title = 'Edit User';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(1);
// ?>
// <?php
//   $e_user = find_by_id('users',(int)$_GET['id']);
//   $groups  = find_all('user_groups');
//   if(!$e_user){
//     $session->msg("d","Missing user id.");
//     redirect('users.php');
//   }
// ?>

<?php
// //Update User basic info
//   if(isset($_POST['update'])) {
//     $req_fields = array('name','username','level');
//     validate_fields($req_fields);
//     if(empty($errors)){
//              $id = (int)$e_user['id'];
//            $name = remove_junk($db->escape($_POST['name']));
//        $username = remove_junk($db->escape($_POST['username']));
//           $level = (int)$db->escape($_POST['level']);
//        $status   = remove_junk($db->escape($_POST['status']));
//             $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
//          $result = $db->query($sql);
//           if($result && $db->affected_rows() === 1){
//             $session->msg('s',"Acount Updated ");
//             redirect('edit_user.php?id='.(int)$e_user['id'], false);
//           } else {
//             $session->msg('d',' Sorry failed to updated!');
//             redirect('edit_user.php?id='.(int)$e_user['id'], false);
//           }
//     } else {
//       $session->msg("d", $errors);
//       redirect('edit_user.php?id='.(int)$e_user['id'],false);
//     }
//   }
?>
<?php
// // Update user password
// if(isset($_POST['update-pass'])) {
//   $req_fields = array('password');
//   validate_fields($req_fields);
//   if(empty($errors)){
//            $id = (int)$e_user['id'];
//      $password = remove_junk($db->escape($_POST['password']));
//      $h_pass   = sha1($password);
//           $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
//        $result = $db->query($sql);
//         if($result && $db->affected_rows() === 1){
//           $session->msg('s',"User password has been updated ");
//           redirect('edit_user.php?id='.(int)$e_user['id'], false);
//         } else {
//           $session->msg('d',' Sorry failed to updated user password!');
//           redirect('edit_user.php?id='.(int)$e_user['id'], false);
//         }
//   } else {
//     $session->msg("d", $errors);
//     redirect('edit_user.php?id='.(int)$e_user['id'],false);
//   }
// }

?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit User</h2>
                    
                  
                  <form method="post" action="edit_user.php">
                        <!-- User Information Section -->
                        <div class="space-y-4 max-w-md">
                            <h3 class="text-lg font-medium text-gray-800">User Information</h3>
                            
                            <!-- Name -->
                            <div>
                                <label for="userName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <input type="text" id="userName" name="name"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                <input type="text" id="username" name="username"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <!-- User Role Dropdown -->
                            <div>
                                <label for="userRole" class="block text-sm font-medium text-gray-700 mb-1">User Role</label>
                                <select id="userRole" name="level"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="admin">Admin</option>
                                    <option value="special">Special User</option>
                                </select>
                            </div>
                            
                            <!-- Status Dropdown -->
                            <div>
                                <label for="userStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select id="userStatus" name="status"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 pt-6">
                                <button type="submit" name="update" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                  </form>  
            
                  <form method="post"action="edit_user.php">
                        <!-- Password Section (Separate) -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-4">Change Password</h3>
                            
                            <div class="space-y-4 max-w-md">
                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                    <input type="password" name="password"id="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex space-x-3 pt-6">
                            <button type="submit" name="update-pass" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Save Changes
                            </button>
                        </div>
                  </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>