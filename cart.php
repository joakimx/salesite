<!DOCTYPE>
<?php
session_start();
  include("functions/function.php");
  include("includes/db.php");
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
            <a href="index.php" style="text-decoration: none;"><b style="color:yellow; padding-left: 10px;">Back to Shop</b></a>
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
        <form action="cart.php" method="post" enctype="multipart/form-data">
          <table align=center width="700" bgcolor="skyblue">
            <tr align="center">
              <th>Remove</th>
              <th>Product(s)</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </tr>
            <?php
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
                $product_title = $pp_price['product_title'];
                $product_image = $pp_price['product_image'];
                $single_price = $pp_price['product_price'];
                $values = array_sum($product_price);
                $total += $values;
             ?>
             <tr align="center">
               <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
               <td><?php $product_title; ?>
               <br>
               <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60" />
               </td>
               <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'] ; ?>"/></td>
               <?php
               if(isset($_POST['update_cart']))
               {
                 $qty = $_POST['qty'];
                 $update_qty = "UPDATE cart SET qty='$qty'";
                 $update_run = mysqli_query($con, $update_qty);
                 $_SESSION['qty'] = $qty;
                 $total = $total * $qty;

               }
               ?>
               <td><?php echo "$ " . $single_price; ?></td>
             </tr>
             <?php
           }
         }
         ?>
         <tr align="right">
           <td colspan="4"><b> Subtotal: $</b> </td>
           <td colspan="4"><?php echo $total; ?> </td>
         </tr>
         <tr align="center">
           <td colspan="3"><input type="submit" name="update_cart" value="Update Cart" /></td>
           <td><input type="submit" name="continue" value="Continue Shopping" /></td>
           <td><a href="checkout.php" style="color:black;">Checkout</a></td>
         </tr>
          </table>
        </form>
        <?php
        function updateCart(){

        global $con;
        $ip = getIp();
        if(isset($_POST['update_cart']))
        {
          foreach ($_POST['remove'] as $remove_id) {
            $delete_products = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";
            $run_delete = mysqli_query($con, $delete_products);
            if($run_delete)
            {
              echo "<script>window.open('cart.php', '_self')</script>";
            }

          }
        }
        if(isset($_POST['continue']))
        {
          echo "<script>window.open('index.php', '_self')</script>";
        }

      }
      echo @$up_cart = updateCart();
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
