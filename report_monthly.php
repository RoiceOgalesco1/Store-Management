<?php
  $page_title = 'Monthly Sales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
//   page_require_level(3);
  
  $year = date('Y');
  $sales = monthlySales($year);
?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Monthly Sales</h2>
                    
                    <?php echo display_msg($msg); ?>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr class=" text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Product name</th>
                                    <th scope="col" class="px-6 py-3">Quantity sold</th>
                                    <th scope="col" class="px-6 py-3">Total</th>
                                    <th scope="col" class="px-6 py-3">Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($sales as $sale):?>
                                <tr class=" whitespace-nowrap text-sm text-gray-500">
                                    <td class="px-6 py-4"><?php echo count_id();?></td>
                                    <td class="px-6 py-4 font-medium"><?php echo remove_junk($sale['name']); ?></td>
                                    <td class="px-6 py-4"><?php echo (int)$sale['qty']; ?></td>
                                    <td class="px-6 py-4"><?php echo remove_junk($sale['total_saleing_price']); ?></td>
                                    <td class="px-6 py-4"><?php echo $sale['date']; ?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>