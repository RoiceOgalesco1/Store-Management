<?php
$page_title = 'All Image';
require_once('includes/load.php');
// page_require_level(2);

// Pagination variables
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Items per page
$offset = ($current_page - 1) * $per_page;

// Get paginated media files
$media_files = find_paginated_media($per_page, $offset);
$total_count = count_by_id('media')['total'];
$total_pages = ceil($total_count / $per_page);
$start_item = $offset + 1;
$end_item = min($offset + $per_page, $total_count);
?>

<?php
if(isset($_POST['submit'])) {
    $photo = new Media();
    $photo->upload($_FILES['file_upload']);
    if($photo->process_media()){
        $session->msg('s','photo has been uploaded.');
        redirect('media.php');
    } else{
        $session->msg('d',join($photo->errors));
        redirect('media.php');
    }
}
?>
<?php include_once ("./pagination.php");?>
<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Media Files</h2>
                        <?php echo display_msg($msg); ?>
                        <div x-data="{ files: [] }" class="flex items-center space-x-2">
                            <!-- File selection display -->
                            <div x-show="files.length > 0" class="flex items-center space-x-2 bg-gray-100 px-3 py-1 rounded-md text-sm">
                                <span x-text="files.length + ' file(s) selected'" class="text-gray-700"></span>
                                <button @click="files = []" class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Upload controls -->
                            <form class="flex space-x-2" action="media.php" method="POST" enctype="multipart/form-data">
                                <label class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-md transition text-sm">
                                    Select Files
                                    <input type="file" name="file_upload" class="hidden" multiple @change="files = Array.from($event.target.files)">
                                </label>
                                <button 
                                    x-show="files.length > 0" 
                                    type="submit" 
                                    name="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-md transition text-sm"
                                >
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>
            
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Photo</th>
                                    <th scope="col" class="px-6 py-3">Photo Name</th>
                                    <th scope="col" class="px-6 py-3">Photo Type</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($media_files as $media_file): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $media_file['id'];?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-200">
                                            <img src="uploads/products/<?php echo $media_file['file_name'];?>"class="h-full w-full object-cover">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $media_file['file_name'];?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $media_file['file_type'];?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="delete_media.php?id=<?php echo (int) $media_file['id'];?>" class="text-red-500 hover:text-red-700">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium"><?php echo $start_item; ?></span> to <span class="font-medium"><?php echo $end_item; ?></span> of <span class="font-medium"><?php echo $total_count; ?></span> entries
                        </div>
                        <div class="flex space-x-2 text-sm font-medium text-gray-700 bg-white">
                            <?php if ($current_page > 1): ?>
                                <a href="?page=<?php echo $current_page - 1; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">
                                    Previous
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-400 cursor-not-allowed">Previous</span>
                            <?php endif; ?>
                            
                            <?php if ($current_page < $total_pages): ?>
                                <a href="?page=<?php echo $current_page + 1; ?>" class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">
                                    Next
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-1 border border-gray-300 rounded-md text-gray-400 cursor-not-allowed">Next</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>