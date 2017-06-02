<!DOCTYPE>
<?php
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
      <img id="logo" src="images/logo.gif">
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
          <span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">
            Welcome Guest <b style="color:yellow">Shopping Cart - </b>
            Total Items:
            Total Price:
            <a href="cart.php">Go to Cart</a>
          </span>
        </div>
      <div id="products_box">
        <?php
        if(isset($_GET['pro_id']))
        {
          $product_id = $_GET['pro_id'];
          $get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
          $run_pro = mysqli_query($con, $get_pro);
          while($row_pro=mysqli_fetch_array($run_pro))
          {
            $pro_id = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_desc = $row_pro['product_desc'];

            echo "<div id='single_product'>
              <h3>$pro_title</h3>
              <img src='admin_area/product_images/$pro_image' width='400' height='300' />
              <p> Price: \$CDN: $pro_price </p>
              <p> $pro_desc </p>
              <a href='index.php?pro_id=$pro_id' style='float:left;'> Go Back </a>
              <a href='index.php'><button style='float:right'>Add to cart</button></a>
            </div>
            ";
          }
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
