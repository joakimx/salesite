<?php
//Databse connection_status
$con = new mysqli("localhost", "notroot1", "P@ssw0rd", "ecommerce1");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


//Function to detect IP address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}




//Add/delete items from cart
function cart () {
  if(isset($_GET['add_cart'])) {
    global $con;
    $ip = getIp();
    $pro_id = $_GET['add_cart'];
    $check_pro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id'";
    $run_check = mysqli_query($con, $check_pro);
    if ( mysqli_num_rows($run_check) > 0 ) {
      echo "";
    } else {
      $insert_pro = "INSERT INTO cart (p_id, ip_add) VALUES ('$pro_id', '$ip')";
      $run_pro = mysqli_query($con, $insert_pro);
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}



// Get total items and price to display in ain page/duration of Sessio

function total_items()
{
  if(isset($_GET['add_cart']))
  {
    global $con;
    $ip = getIp();

    $get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  } else {
    global $con;
    $ip = getIp();

    $get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }
  echo $count_items;
}



//Get price in cart to display

function total_price()
{
  $total = 0;
  global $con;
  $ip = getIp();
  $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
  $run_price = mysqli_query($con, $sel_price);
  while($p_price=mysqli_fetch_array($run_price))
  {
    $pro_id = $p_price['p_id'];
    $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_pro_price = mysqli_query($con, $pro_price);

    while ($pp_price = mysqli_fetch_array($run_pro_price))
    {
      $product_price = array($pp_price['product_price']);
      $values = array_sum($product_price);
      $total += $values;
    }
  }
  echo $total;
}

//Get categories

function getCats ()
{
  global $con;
  $get_cats = "SELECT * FROM categories";
  $run_cats = mysqli_query($con, $get_cats);
  while ($row_cats=mysqli_fetch_array($run_cats))
  {
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  }

}

//Get genre
function getBrands()
{
  global $con;
  $get_brands = "SELECT * FROM brands";
  $run_brand = mysqli_query($con, $get_brands);
  while ($row_brand=mysqli_fetch_array($run_brand))
  {
    $brand_id = $row_brand['brand_id'];
    $brand_title = $row_brand['brand_title'];
    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
  }

}

//Get products
function getPro()
{
  if (!isset($_GET['cat']))
  {
    if (!isset($_GET['brand']))
    {
      global $con;
      $get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
      $run_pro = mysqli_query($con, $get_pro);

      while($row_pro=mysqli_fetch_array($run_pro))
      {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];

        echo "<div id='single_product'>
          <h3>$pro_title</h3>
          <img src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p> Price: \$CDN: $pro_price </p>
          <a href='details.php?pro_id=$pro_id' style='float:left;'> Details </a>
          <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
          </div>
          ";
        }
    }
  }
}

function getCatPro()
{
  if (isset($_GET['cat']))
  {
    $cat_id = $_GET['cat'];
      global $con;
      $get_cat_pro = "SELECT * FROM products WHERE product_cat='$cat_id'";
      $run_cat_pro = mysqli_query($con, $get_cat_pro);
      $count = mysqli_num_rows($run_cat_pro);
      if($count == 0)
      {
        echo "<h2 style='padding: 30px'> No product in this category </h2>";
      }
      while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
      {
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_image'];

          echo "<div id='single_product'>
          <h3>$pro_title</h3>
          <img src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p> Price: \$CDN: $pro_price </p>
          <a href='details.php?pro_id=$pro_id' style='float:left;'> Details </a>
          <a href='index.php'><button style='float:right'>Add to cart</button></a>
          </div>
          ";
        }
  }
}

function getBrandPro()
{
  if (isset($_GET['brand']))
  {
    $brand_id = $_GET['brand'];
      global $con;
      $get_brand_pro = "SELECT * FROM products WHERE product_brand='$brand_id'";
      $run_brand_pro = mysqli_query($con, $get_brand_pro);
      $count = mysqli_num_rows($run_brand_pro);
      if($count == 0)
      {
        echo "<h2 style='padding: 30px'> No product in this category </h2>";
      }
      while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
      {
        $pro_id = $row_brand_pro['product_id'];
        $pro_cat = $row_brand_pro['product_cat'];
        $pro_brand = $row_brand_pro['product_brand'];
        $pro_title = $row_brand_pro['product_title'];
        $pro_price = $row_brand_pro['product_price'];
        $pro_image = $row_brand_pro['product_image'];

          echo "<div id='single_product'>
          <h3>$pro_title</h3>
          <img src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p> Price: \$CDN: $pro_price </p>
          <a href='details.php?pro_id=$pro_id' style='float:left;'> Details </a>
          <a href='index.php'><button style='float:right'>Add to cart</button></a>
          </div>
          ";
        }
  }
}

 ?>
