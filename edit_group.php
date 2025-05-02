<?php
  $page_title = 'Edit Group';
  require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(1);
?>
<?php
//   $e_group = find_by_id('user_groups',(int)$_GET['id']);
//   if(!$e_group){
//     $session->msg("d","Missing Group id.");
//     redirect('group.php');
//   }
?>
<?php
//   if(isset($_POST['update'])){

//    $req_fields = array('group-name','group-level');
//    validate_fields($req_fields);
//    if(empty($errors)){
//            $name = remove_junk($db->escape($_POST['group-name']));
//           $level = remove_junk($db->escape($_POST['group-level']));
//          $status = remove_junk($db->escape($_POST['status']));

//         $query  = "UPDATE user_groups SET ";
//         $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}'";
//         $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
//         $result = $db->query($query);
//          if($result && $db->affected_rows() === 1){
//           //sucess
//           $session->msg('s',"Group has been updated! ");
//           redirect('edit_group.php?id='.(int)$e_group['id'], false);
//         } else {
//           //failed
//           $session->msg('d',' Sorry failed to updated Group!');
//           redirect('edit_group.php?id='.(int)$e_group['id'], false);
//         }
//    } else {
//      $session->msg("d", $errors);
//     redirect('edit_group.php?id='.(int)$e_group['id'], false);
//    }
//  }
?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- dashboard content -->
            <main class="p-6 bg-gray-50" x-data="{ showAddCategory: false }">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit User</h2>
                    
                    <div class="space-y-4 max-w-md">
                        <!-- Group Name -->
                        <div>
                            <label for="groupName" class="block text-sm font-medium text-gray-700 mb-1">Group Name</label>
                            <input type="text" id="group-name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <!-- Group Level -->
                        <div>
                            <label for="groupLevel" class="block text-sm font-medium text-gray-700 mb-1">Group Level</label>
                            <input type="text" id="group-level" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <!-- Status Dropdown -->
                        <div>
                            <label for="groupStatus" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="groupStatus" name="status"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex space-x-3 pt-4">
                            <button type="submit" name="update" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>