<!DOCTYPE>
<?php
  include("functions/function.php");
  session_start();
?>
<html>
<head>
  <title> Sales site </title>
  <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
  <!-- main container  -->
  <div class="main_wrapper">
    <div class="header_wrapper">
      <a href="index.php"> <img id="logo" src="images/logo.gif"> </a>
    </div>
    <!-- Nav bar -->
    <div class="menubar">
      <ul id="menu">
        <li><a href="index.php"> Home </a></li>
        <li><a href="all_products.php"> All Products </a></li>
        <li><a href="customer/my_account.php"> My Account </a></li>
        <li><a href="#"> Sign Up </a></li>
        <li><a href="cart.php"> Cart </a></li>
        <li><a href="#"> Contact Us </a></li>
      </ul>
      <!-- Search bar -->
      <div id="form">
        <form method="GET" action="results.php" enctype="multipart/form-data">
          <input type="text" name="user_query" placeholder="Search for products" />
          <input type="submit" name="search" value="search" />
        </form>
      </div>
    </div>

    <!-- Page content -->
    <div class="content_wrapper">
      <!-- Side bar or page -->
      <div id="sidebar">Side Bar
        <div id="sidebar_title"> Categories </div>
        <ul id="cats">
          <?php getCats(); ?>
        </ul>

        <div id="sidebar_title"> Brands </div>
        <ul id="cats">
          <?php getBrands(); ?>
        </ul>

      </div>
      <!-- Main content area -->
      <div id="content_area">
        <div id="shopping_cart">
          <span style="float:right; font-size: 14px; padding: 5px; line-height: 40px;">
            <?php
            if(!isset($_SESSION['customer_email']))
            {
              echo "Welcome Guest";
            } else {
              echo "Welcome " . $_SESSION['customer_email'];
            }
            ?>
            <b style="color:yellow; padding-left: 10px;">Shopping Cart - </b>
            Total Items: <?php total_items(); ?>
            Total Price: $ <?php total_price(); ?>
            <a href="cart.php" style="text-decoration: none;"><b style="color:yellow; padding-left: 10px;">Go to Cart</b></a>
            <?php
            if(!isset($_SESSION['customer_email']))
            {
              echo "<a href='checkout.php' style='color: orange; text-decoration: none; padding-left: 10px;'> <b>Login</b> </a>";
            } else {
              echo "<a href='logout.php' style='color: orange; text-decoration: none; padding-left: 10px;'> <b>Logout</b> </a>";
            }
            ?>
          </span>
        </div>
      <div id="products_box">
        <?php
        $get_pro = "SELECT * FROM products";
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
            <a href='index.php'><button style='float:right'>Add to cart</button></a>
            </div>
            ";
          }
          ?>

      </div>
    </div>
    <div id="footer">
      <h2 style="text-align: center; padding-top: 30px;">
        &copy; 2017 Created by Loven Costa
      </h2>
    </div>
  </div>
  <!-- Main container ends -->
</body>
</html>
