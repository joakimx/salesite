<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<body>

  <?php
  include("includes/db.php");
  include("functions/function.php");

  //Product Details
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
      $product_id = $pp_price['product_id'];
      $values = array_sum($product_price);
      $total += $values;
    }
  }

  //Customer Details
  $user = $_SESSION['customer_email'];
  $get_c = "SELECT * FROM customers WHERE customer_email='$user'";
  $run_c = mysqli_query($con, $get_c);
  $row_c = mysqli_fetch_array($run_c);
  $c_id = $row_c['customer_id'];

  //Paypal Success/reject details

  $amount = $_GET['amt'];
  $currency = $_GET['cc'];
  $trx_id = $_GET['tx'];

  if ($amount == $total) {
    echo "<h2>Welcome: " . $_SESSION['customer_email'] . " , your payment was successful!</h2>";
    echo '<h2><a href=customer/my_account.php>Go to your account</a></h2>';
  } else {
    echo "Payment was rejected!";
    echo '<h2><a href=customer/my_account.php>Go to your account</a></h2>';
  }
   ?>

</body>
</html>
