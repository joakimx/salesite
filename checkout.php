<!DOCTYPE>
<?php
  session_start();
  include("functions/function.php");
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
      <div id="sidebar">
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
        <?php cart(); ?>
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
        if(!isset($_SESSION['customer_email']))
        {
          include("customer_login.php");
        } else {
          include("payment.php");
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
