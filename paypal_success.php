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

  //Getting quantity of the products
  $get_qty = "SELECT * FROM cart WHERE p_id = '$pro_id'";
  $run_qty = mysqli_query($con, $get_qty);
  $row_qty = mysqli_fetch_array($run_qty);
  $qty = $row_qty['qty'];

  //Customer Details
  $user = $_SESSION['customer_email'];
  $get_c = "SELECT * FROM customers WHERE customer_email='$user'";
  $run_c = mysqli_query($con, $get_c);
  $row_c = mysqli_fetch_array($run_c);
  $c_id = $row_c['customer_id'];

//If qty is not 0, assign to qty, otherwise set qty to 0
  if($qty == 0) {
    $qty = 1;
  } else {
    $qty = $qty;
    $total = $total * $qty;
  }
  //Paypal Success/reject details

  $amount = $_GET['amt'];
  $currency = $_GET['cc'];
  $trx_id = $_GET['tx'];
  $invoice = mt_rand();
  //Inserting payments to table
  $insert_payments = "INSERT INTO payments(amount,customer_id, product_id, trx_id, currency, payment_date) 
  VALUES('$amount', '$c_id', '$pro_id', '$trx_id', '$currency', NOW())";
  //Inserting orders to table
  $run_payments = mysqli_query($con, $insert_payments);
  $insert_order = "INSERT INTO orders (p_id, c_id, qty, invoice_no, order_date, status) 
  VALUES('$pro_id', '$c_id', '$qty', '$invoice', NOW(), 'In Progress')";
  $run_order = mysqli_query($con, $insert_order);

  //Empty cart
  $empty_cart = "DELETE FROM cart";
  $run_cart = mysqli_query($con, $empty_cart);

  //Paypal check
  if ($amount == $total) {
    echo "<h2>Welcome: " . $_SESSION['customer_email'] . "<br> , your payment was successful!</h2>";
    echo '<h2><a href=customer/my_account.php>Go to your account</a></h2>';
  } else {
    echo "Payment was rejected!";
    echo '<h2><a href=customer/my_account.php>Go to your account</a></h2>';
  }
  
  $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <sales@kensingtonsbookmarte.com>' . "\r\n";
			
	$subject = "Order Details";
			
	$message = "<html> 
		<p>
			
		Hello dear <b style='color:blue;'>$c_name</b> you have ordered some products on Kensington's Book Marte , please find your order details, your order will be processed shortly. Thank you!</p>
			
			<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
				<tr align='center'><td colspan='6'><h2>Your Order Details from Kensington's Book Marte</h2></td></tr>
					
				<tr align='center'>
					<th><b>S.N</b></th>
					<th><b>Product Name</b></th>
					<th><b>Quantity</b></th>
					<th><b>Paid Amount</th></th>
					<th>Invoice No</th>
				</tr>
					
				<tr align='center'>
					<td>1</td>
					<td>$pro_name</td>
					<td>$qty</td>
					<td>$amount</td>
					<td>$invoice</td>
				</tr>
			
			</table>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='#'>Click here</a> to login to your account</h2>
				
				<h3> Thank you for your order @ - Kensington's Book Marte</h3>
				
			</html>
			";
			
			mail($c_email,$subject,$message,$headers);
   ?>

</body>
</html>
