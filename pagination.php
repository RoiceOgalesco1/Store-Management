<?

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
?>