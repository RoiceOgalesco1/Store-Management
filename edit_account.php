<?php
//   $page_title = 'Edit Account';
//   require_once('includes/load.php');
//    page_require_level(3);
?>
<?php
// //update user image
//   if(isset($_POST['submit'])) {
//   $photo = new Media();
//   $user_id = (int)$_POST['user_id'];
//   $photo->upload($_FILES['file_upload']);
//   if($photo->process_user($user_id)){
//     $session->msg('s','photo has been uploaded.');
//     redirect('edit_account.php');
//     } else{
//       $session->msg('d',join($photo->errors));
//       redirect('edit_account.php');
//     }
//   }
?>
<?php
//  //update user other info
//   if(isset($_POST['update'])){
//     $req_fields = array('name','username' );
//     validate_fields($req_fields);
//     if(empty($errors)){
//              $id = (int)$_SESSION['user_id'];
//            $name = remove_junk($db->escape($_POST['name']));
//        $username = remove_junk($db->escape($_POST['username']));
//             $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
//     $result = $db->query($sql);
//           if($result && $db->affected_rows() === 1){
//             $session->msg('s',"Acount updated ");
//             redirect('edit_account.php', false);
//           } else {
//             $session->msg('d',' Sorry failed to updated!');
//             redirect('edit_account.php', false);
//           }
//     } else {
//       $session->msg("d", $errors);
//       redirect('edit_account.php',false);
//     }
//   }
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Profile Settings</h2>
                    
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Profile Picture Section -->
                        <div class="w-full md:w-1/3">
                            <div class="flex flex-col items-center">
                                <div class="relative mb-4">
                                    <img id="profile-preview" src="./images/circle.jpg" class="w-32 h-32 rounded-full object-cover border-2 border-gray-200">
                                    <label for="profile-upload" class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-md cursor-pointer hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <input id="profile-upload" type="file" accept="image/*" class="hidden">
                                    </label>
                                </div>
                                <button id="remove-photo" class="text-sm text-red-500 hover:text-red-700">Remove photo</button>
                            </div>
                        </div>
                        
                        <!-- Remove the outer form tag and keep only one form -->
                        <form method="post" action="edit_account.php" class="w-full">
                            <div class="flex flex-col md:flex-row gap-8">
                                
                                <div class="w-full md:w-2/3">
                                    <div class="space-y-4">
                                        <div class="w-full">
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                            <input x-model="name" type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        
                                        <div class="w-full">
                                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                            <input x-model="username" type="text" id="username" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        
                                        <div class="pt-2 w-full">
                                            <button type="submit" class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

<script>
    // Profile picture upload functionality
    document.getElementById('profile-upload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('profile-preview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove photo functionality
    document.getElementById('remove-photo').addEventListener('click', function() {
        document.getElementById('profile-preview').src = 'https://via.placeholder.com/150';
        document.getElementById('profile-upload').value = '';
    });
</script>