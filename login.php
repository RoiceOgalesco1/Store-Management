
<?php
  // ob_start();
  // require_once('includes/load.php');
  // if($session->isUserLoggedIn(true)) { redirect('admin_dashboard.php', false);}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
  </head>
  
  <body class="bg-gray-100 min-h-screen flex items-center justify-center">
      <div class="container max-w-md mx-auto">
          <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Inventory System</h1>

            <form method="post" action="auth.php">
              <div class="mb-4">
                <label for="username"
                  class="block text-gray-700 text-sm font-medium mb-2">
                  Username
                </label
                >
                <input type="username"
                  id="username"
                  placeholder="Enter your Username"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required/>
              </div>

              <div class="mb-6">
                <label for="password"
                  class="block text-gray-700 text-sm font-medium mb-2">
                  Password
                </label
                >
                <input type="password"
                  id="password"
                  placeholder="Enter your password"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required/>
              </div>

              <!-- Backend -->
              <!-- <button
                type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 
                transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Sign In
              </button> -->

              <!-- Temporary Signin -->
              <a
                href="./admin_dashboard.php"
                class="w-full block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 text-center"
              >
                Sign In
              </a>
            </form>

          </div>
      </div>
    </div>
  </body>
</html>
