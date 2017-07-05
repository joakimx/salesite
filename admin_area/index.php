<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>


<!DOCTYPE>
<html>
<head>
  <title> Admin Panel </title>
  <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
  <div class="main_wrapper">
    <div id="header">
    </div>
    <div id="right">
		<h2 style="text-align:center;">Manage Content</h2>
			<a href="index.php?insert_product">Insert New Product</a>
			<a href="index.php?view_products">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cats">View All Categories</a>
			<a href="index.php?insert_brand">Insert New Brand</a>
			<a href="index.php?view_brands">View All Brands</a>
			<a href="index.php?view_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>

		</div>

    <div id="left">
      <?php
      if(isset($_GET['insert_product']))
      {
        include("insert_product.php");
      } else if (isset($_GET['view_products'])) {
        include("view_products.php");
      } else if (isset($_GET['edit_pro'])) {
        include("edit_pro.php");
      } else if (isset($_GET['insert_cat'])) {
        include("insert_cat.php");
      } else if (isset($_GET['view_cats'])) {
        include("view_cats.php");
      } else if (isset($_GET['edit_cat'])) {
        include("edit_cat.php");
      } else if (isset($_GET['insert_brand'])) {
        include("insert_brand.php");
      } else if (isset($_GET['view_brands'])) {
        include("view_brands.php");
      } else if (isset($_GET['edit_brand'])) {
        include("edit_brand.php");
      } else if (isset($_GET['view_customers'])) {
        include("view_customers.php");
      } else if (isset($_GET['view_orders'])) {
        include("view_orders.php");
      } else if (isset($_GET['view_payments'])) {
        include("view_payments.php");
      }
      ?>
    </div>
  </div>
</body>
</html>
<?php
}
 ?>
<?php
include('includes/db.php');
  if(isset($_GET['confirm_order'])) {
    $get_id = $_GET['confirm_order'];
    $status = 'Completed';
    $update_order = "UPPDATE orders SET status='$completed' WHERE order_id ='$get_id";
    $run_update = mysqli_query($con, $update_order);
    if($run_update){
      echo "<script>alert('Order Was Updated')</script>";
      echo "<script>window.open('index.php?view_orders', '_self')</script>";
    }
  }

  ?>