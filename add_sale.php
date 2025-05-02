<?php
//   $page_title = 'Add Sale';
//   require_once('includes/load.php');
//   // Checkin What level user has permission to view this page
//    page_require_level(3);
?>
<?php
//   if(isset($_POST['add_sale'])){
//     $req_fields = array('s_id','quantity','price','total', 'date' );
//     validate_fields($req_fields);
//         if(empty($errors)){
//           $p_id      = $db->escape((int)$_POST['s_id']);
//           $s_qty     = $db->escape((int)$_POST['quantity']);
//           $s_total   = $db->escape($_POST['total']);
//           $date      = $db->escape($_POST['date']);
//           $s_date    = make_date();

//           $sql  = "INSERT INTO sales (";
//           $sql .= " product_id,qty,price,date";
//           $sql .= ") VALUES (";
//           $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
//           $sql .= ")";

//                 if($db->query($sql)){
//                   update_product_qty($s_qty,$p_id);
//                   $session->msg('s',"Sale added. ");
//                   redirect('add_sale.php', false);
//                 } else {
//                   $session->msg('d',' Sorry failed to add!');
//                   redirect('add_sale.php', false);
//                 }
//         } else {
//            $session->msg("d", $errors);
//            redirect('add_sale.php',false);
//         }
//   }

?>

<?php include_once ("./layouts/admin_sidebar.php");?>
<?php include_once ("./layouts/header.php");?>
            <!-- Dashboard Content -->
            <main class="p-6 bg-gray-50">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100" x-data="dashboard">
                    <!-- Product Search Section -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Add Products</h2>
                        <div class="relative">
                            <div class="flex">
                                <input 
                                    type="text" 
                                    id="sug_input"
                                    name="title"
                                    placeholder="Enter product name..." 
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    x-model="searchQuery"
                                    @input.debounce.300ms="getSuggestions"
                                    @focus="showSuggestions = true"
                                    @blur="setTimeout(() => showSuggestions = false, 200)"
                                >
                                <button
                                    type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    @click="searchProducts"
                                >
                                    Search
                                </button>
                            </div>
                            <!-- Suggestions Dropdown -->
                            <div 
                                x-show="showSuggestions && suggestions.length > 0"
                                class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md border border-gray-200 max-h-60 overflow-auto"
                            >
                                <ul>
                                    <template x-for="suggestion in suggestions" :key="suggestion.id">
                                        <li 
                                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            @mousedown="selectSuggestion(suggestion)"
                                            x-text="suggestion.name"
                                        ></li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="add_sale.php">
                        <!-- Search Results Table -->
                        <div x-show="showResults" class="overflow-x-auto mb-6">
                            <div x-show="products.length === 0" class="text-center py-4 text-gray-500">
                                No products found matching your search.
                            </div>
                            <table x-show="products.length > 0" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <th scope="col" class="px-3 py-2">Item</th>
                                        <th scope="col" class="px-3 py-2">Price</th>
                                        <th scope="col" class="px-3 py-2">Quantity</th>
                                        <th scope="col" class="px-3 py-2">Total</th>
                                        <th scope="col" class="px-3 py-2">Branch</th>
                                        <th scope="col" class="px-3 py-2">Date</th>
                                        <th scope="col" class="px-3 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <template x-for="(product, index) in paginatedProducts" :key="product.id">
                                        <tr class="whitespace-nowrap text-sm text-gray-900">
                                            <td class="px-3 py-2" x-text="product.name"></td>
                                            <td class="px-3 py-2">
                                                <input 
                                                    type="number" 
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-sm"
                                                    x-model="product.price"
                                                    @change="updateTotal(index)"
                                                    step="0.01"
                                                    min="0">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="number" 
                                                    class="w-16 px-2 py-1 border border-gray-300 rounded text-sm"
                                                    x-model="product.quantity"
                                                    @change="updateTotal(index)"
                                                    min="1">
                                            </td>
                                            <td class="px-3 py-2" x-text="'₱' + (product.price * product.quantity).toFixed(2)"></td>
                                            <td class="px-3 py-2" x-text="product.branch"></td>
                                            <td class="px-3 py-2">
                                                <input type="date" 
                                                    class="px-2 py-1 border border-gray-300 rounded text-sm"
                                                    x-model="product.date">
                                            </td>
                                            <td class="px-3 py-2">
                                                <button class="px-2 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 text-sm"
                                                    @click="addProduct(product)">
                                                    Add
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </form>


                    <!-- Pagination -->
                    <div x-show="showResults && products.length > 0" class="flex items-center justify-between mt-4">
                        <div class="text-sm text-gray-500">
                            Showing <span x-text="(currentPage - 1) * itemsPerPage + 1" class="font-medium"></span> to 
                            <span x-text="Math.min(currentPage * itemsPerPage, products.length)" class="font-medium"></span> of 
                            <span x-text="products.length" class="font-medium"></span> entries
                        </div>
                        <div class="flex space-x-2 text-sm font-medium text-gray-700 bg-white">
                            <button 
                                class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50" 
                                @click="currentPage--" 
                                :disabled="currentPage === 1">
                                Previous
                            </button>
                            <template x-for="page in totalPages" :key="page">
                                <button 
                                    class="px-3 py-1 border rounded-md" 
                                    :class="page === currentPage ? 'bg-blue-600 text-white border-blue-600' : 'border-gray-300 hover:bg-gray-50'"
                                    @click="currentPage = page"
                                    x-text="page">
                                </button>
                            </template>
                            <button 
                                class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50" 
                                @click="currentPage++" 
                                :disabled="currentPage === totalPages">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dashboard', () => ({
            searchQuery: '',
            showResults: false,
            showSuggestions: false,
            products: [],
            suggestions: [],
            currentPage: 1,
            itemsPerPage: 3,
            
            // Sample product data - replace with your actual data source
            allProducts: [
                { id: 1, name: 'Apple', price: 25.50, quantity: 10, branch: 'Main Branch', date: '2023-05-15' },
                { id: 2, name: 'Banana', price: 10.75, quantity: 20, branch: 'Downtown Branch', date: '2023-05-14' },
                { id: 3, name: 'Orange', price: 15.25, quantity: 15, branch: 'Main Branch', date: '2023-05-13' },
                { id: 4, name: 'Mango', price: 35.00, quantity: 8, branch: 'North Branch', date: '2023-05-12' }
            ],
            
            get paginatedProducts() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.products.slice(start, end);
            },
            
            get totalPages() {
                return Math.ceil(this.products.length / this.itemsPerPage);
            },
            
            getSuggestions() {
                if (this.searchQuery.trim() === '') {
                    this.suggestions = [];
                    return;
                }
                
                const query = this.searchQuery.toLowerCase();
                this.suggestions = this.allProducts.filter(product => 
                    product.name.toLowerCase().includes(query)
                ).slice(0, 5); // Show max 5 suggestions
            },
            
            selectSuggestion(suggestion) {
                this.searchQuery = suggestion.name;
                this.showSuggestions = false;
                this.searchProducts();
            },
            
            searchProducts() {
                if (this.searchQuery.trim() === '') {
                    this.showResults = false;
                    return;
                }
                
                const query = this.searchQuery.toLowerCase();
                // Create a deep copy of the products to allow independent editing
                this.products = JSON.parse(JSON.stringify(this.allProducts.filter(product => 
                    product.name.toLowerCase().includes(query)
                )));
                
                this.showResults = true;
                this.showSuggestions = false;
                this.currentPage = 1; // Reset to first page on new search
            },
            
            updateTotal(index) {
                // This method is called when price or quantity changes
                // The total is calculated automatically in the template
                this.products = [...this.products];
            },
            
            addProduct(product) {
                alert('Adding product: ' + product.name + 
                      '\nPrice: ₱' + product.price.toFixed(2) + 
                      '\nQuantity: ' + product.quantity + 
                      '\nTotal: ₱' + (product.price * product.quantity).toFixed(2) +
                      '\nBranch: ' + product.branch + 
                      '\nDate: ' + product.date);
            }
        }));
    });
</script>