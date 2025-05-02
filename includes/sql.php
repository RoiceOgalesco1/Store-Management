<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by product id
/*--------------------------------------------------------------*/
function find_by_id_product($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM products WHERE pid='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by product id
/*--------------------------------------------------------------*/
function find_by_id_companies($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM companies WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table, $id_column = 'id', $where = '') {
  global $db;
  if(tableExists($table)) {
    $sql = "SELECT COUNT({$db->escape($id_column)}) AS total FROM ".$db->escape($table);
    if(!empty($where)) {
      $sql .= " " . $where;
    }
    $result = $db->query($sql); 
    return $db->fetch_assoc($result);
  }
  return false;
}


/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result));
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('admin_dashboard.php', false);
      //if Group status Deactive
     elseif($login_level === '0'):
           $session->msg('d','This level user has been band!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.pid,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,p.ar_id,c.cname";
    $sql  .=" AS categorie,m.file_name AS image,cm.bname AS branch_name";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" LEFT JOIN companies cm ON cm.id = p.branch_id";
    $sql  .=" ORDER BY p.pid ASC";
    return find_by_sql($sql);

   }
    /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest for testing
  /*--------------------------------------------------------------*/

  function find_branches_name($branches_name){
    global $db;
    $cm_bname = remove_junk($db->escape($branches_name));
    $sql  =" SELECT p.pid,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,p.ar_id,c.cname";
    $sql  .=" AS categorie,m.file_name AS image,cm.bname AS branch_name";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" LEFT JOIN companies cm ON cm.id = p.branch_id";
    $sql  .=" ORDER BY p.pid ASC";
    $sql  .=" WHERE cm.id ='1'";
    $result = find_by_sql($sql);
    return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }
   /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax1.php for auto suggest
  /*--------------------------------------------------------------*/

  function find_product_titles($product_names){
    global $db;
    $p_names = remove_junk($db->escape($product_names));
    $sql = "SELECT name FROM products WHERE name like '%$p_names%' LIMIT 5";
    $result1 = find_by_sql($sql);
    return $result1;
  }
  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax1.php
  /*--------------------------------------------------------------*/
  function find_all_product_by_titles($titles){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$titles}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products AS p LEFT JOIN companies cm ON p.branch_id = cm.id ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE pid = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.pid,p.name,p.sale_price,p.media_id,p.ar_id,c.cname AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.pid DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added Where ar_id = 0
  /*--------------------------------------------------------------*/
  function find_recent_product_addeds($limit){
    global $db;
    $sql   = " SELECT p.pid,p.name,p.sale_price,p.media_id,p.ar_id,c.cname AS categorie,";
    $sql  .= "m.file_name AS image FROM products p";
    $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
    $sql  .= " WHERE p.ar_id='0'";
    $sql  .= " ORDER BY p.pid DESC LIMIT ".$db->escape((int)$limit);
    return find_by_sql($sql);
  }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_highest_selling_product($limit) {
    global $db;   
    $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
    $sql .= " FROM sales s";
    $sql .= " LEFT JOIN products p ON p.pid = s.product_id";
    $sql .= " WHERE p.ar_id='o'";
    $sql .= " GROUP BY s.product_id";
    $sql .= " ORDER BY totalQty DESC LIMIT " . $db->escape((int)$limit);
    $result = $db->query($sql);
    
    if (!$result) {
        return [];
    }
    
    // Fetch the results and store them in an array
    $products = [];
    while ($row = $db->fetch_assoc($result)) {
        $products[] = $row;
    }

    return $products;
}
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name,cm.bname";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.pid";
   $sql .= " LEFT JOIN  companies cm ON p.branch_id = cm.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales -copy
 /*--------------------------------------------------------------*/
 function find_all_sales_data(){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.pid";
  $sql .= " LEFT JOIN companies cm ON s.product_id = p.pid";
  $sql .= " LEFT JOIN categories c ON c.id = p.pid";
  $sql .= " ORDER BY s.date DESC";
  return find_by_sql($sql);
}
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.pid";
  $sql .= " LEFT JOIN companies cm ON s.product_id = p.pid";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.pid";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,cm.bname,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.pid";
  $sql .= " LEFT JOIN companies cm ON p.branch_id = cm.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.pid";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Users pagination
/*--------------------------------------------------------------*/
function find_paginated_users($per_page, $offset) {
  global $db;
  $sql = "SELECT u.*, g.group_name FROM users u ";
  $sql .= "LEFT JOIN user_groups g ON u.user_level=g.group_level ";
  $sql .= "LIMIT {$per_page} OFFSET {$offset}";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Categories pagination
/*--------------------------------------------------------------*/
function find_paginated_categories($per_page, $offset) {
  global $db;
  $sql = "SELECT * FROM categories LIMIT {$per_page} OFFSET {$offset}";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Brand pagination
/*--------------------------------------------------------------*/
function find_paginated_companies($per_page, $offset) {
  global $db;
  $sql = "SELECT * FROM companies LIMIT {$per_page} OFFSET {$offset}";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Archive pagination
/*--------------------------------------------------------------*/
function find_paginated_archived_products($per_page, $offset) {
  global $db;
  $sql = "SELECT p.*, c.cname AS categorie, m.file_name AS image FROM products p ";
  $sql .= "LEFT JOIN categories c ON p.categorie_id = c.id ";
  $sql .= "LEFT JOIN media m ON p.media_id = m.id ";
  $sql .= "WHERE p.ar_id = '1' ";
  $sql .= "LIMIT {$per_page} OFFSET {$offset}";
  return find_by_sql($sql);
}

function count_archived_products() {
  global $db;
  $sql = "SELECT COUNT(*) AS total FROM products WHERE ar_id = '1'";
  $result = find_by_sql($sql);
  return $result[0]['total'];
}    
/*--------------------------------------------------------------*/
/* Function for Media pagination
/*--------------------------------------------------------------*/
function find_paginated_media($per_page, $offset) {
  global $db;
  $sql = "SELECT * FROM media LIMIT {$per_page} OFFSET {$offset}";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Sales pagination
/*--------------------------------------------------------------*/
?>
