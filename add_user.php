<?php
//   $page_title = 'Add User';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//   page_require_level(1);
//   $groups = find_all('user_groups');
?>
<?php
//   if(isset($_POST['add_user'])){

//    $req_fields = array('full-name','username','password','level' );
//    validate_fields($req_fields);

//    if(empty($errors)){
//            $name   = remove_junk($db->escape($_POST['full-name']));
//        $username   = remove_junk($db->escape($_POST['username']));
//        $password   = remove_junk($db->escape($_POST['password']));
//        $user_level = (int)$db->escape($_POST['level']);
//        $password = sha1($password);
//         $query = "INSERT INTO users (";
//         $query .="name,username,password,user_level,status";
//         $query .=") VALUES (";
//         $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
//         $query .=")";
//         if($db->query($query)){
//           //sucess
//           $session->msg('s',"User account has been creted! ");
//           redirect('add_user.php', false);
//         } else {
//           //failed
//           $session->msg('d',' Sorry failed to create account!');
//           redirect('add_user.php', false);
//         }
//    } else {
//      $session->msg("d", $errors);
//       redirect('add_user.php',false);
//    }
//  }
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php"); ?>
            <!-- dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 max-w-md mx-auto">
                    <h2 class="text-lg font-semibold mb-4">Add New User</h2>
                    <form action="add_user.php" method="post">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" id="name" name="full-name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="mb-6">
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">User Role</label>
                            <select id="role" name="level" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="Admin">Admin</option>
                                <option value="Special">Special</option>
                                <option value="User" selected>User</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="add_user"class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Add User
                        </button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>