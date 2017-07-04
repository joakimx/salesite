<!DOCTYPE>
<?php
  session_start();
  include("functions/function.php");
  include("includes/db.php")
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
      <a href="../index.php"> <img id="logo" src="images/logo.gif"> </a>
    </div>
    <!-- Nav bar -->
    <div class="menubar">
      <ul id="menu">
        <li><a href="../index.php"> Home </a></li>
        <li><a href="../all_products.php"> All Products </a></li>
        <li><a href="my_account.php"> My Account </a></li>
        <li><a href="#"y_account.php?logout> Sign Up </a></li>
        <li><a href="../cart.php"> Cart </a></li>
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
        <div id="sidebar_title"> My Account </div>
        <ul id="cats">
          <?php
          $user = $_SESSION['customer_email'];
          $get_img = "SELECT * FROM customers WHERE customer_email='$user'";
          $run_img = mysqli_query($con, $get_img);
          $row_img = mysqli_fetch_array($run_img);
          $c_image = $row_img['customer_image'];
          $c_name = $row_img['customer_name'];
          echo "<p style='text-align: center;'><img src='customer_images/$c_image' width='150' height='150' /></p>";
          ?>

          <li><a href="my_account.php?my_orders">My Orders</a></li>
          <li><a href="my_account.php?edit_account">Edit Account</a></li>
          <li><a href="my_account.php?change_pass">Edit Password</a></li>
          <li><a href="my_account.php?delete_account">Delete Account</a></li>
          <li><a href="logout.php">Logout</a></li>
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
              echo "<a href='checkout.php' style='color: orange; text-decoration: none; padding-left: 10px;'> <b>Login</b> </a>";
            } else {
              echo "Welcome " . $_SESSION['customer_email'];
              echo "<a href='logout.php' style='color: orange; text-decoration: none; padding-left: 10px;'> <b>Logout</b> </a>";
            }
            ?>
          </span>
        </div>
      <div id="products_box">
        <?php
        if (!isset($_GET['my_orders'])) {
          if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['change_pass'])) {
              if (!isset($_GET['delete_account'])) {
                echo "<h2 style='padding: 20px; color: white;'>Welcome '$c_name'</h2>";
                echo "<b>You can see your orders' progress by clicking <a href='my_account.php?my_orders'>This link</a></b>";
              }
            }
          }
        }
        ?>
        <?php
        if (isset($_GET['edit_account'])) {
          include("edit_account.php");
        } else if (isset($_GET['change_pass'])) {
          include("change_pass.php");
        } else if (isset($_GET['delete_account'])) {
          include("delete_account.php");
        } else if (isset($_GET['my_orders'])) {
          include("my_orders.php");
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
