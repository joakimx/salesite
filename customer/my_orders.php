<table width="795" align="center" bgcolor="pink">
  <tr>
    <td colspan="6"><h2 align="center"> View order details</h2></td>
  </tr>

  <tr align="center" border="2" bgcolor="#DAF7A6">
    <th>S.N</th>
    <th>Product(s)</th>
    <th>Quantity</th>
    <th>Invoice NO</th>
    <th>Order Date</th>
    <th>Status</th>
  </tr>

  <?php
  include("includes/db.php");
  //Customer Details
  $user = $_SESSION['customer_email'];
  $get_c = "SELECT * FROM customers WHERE customer_email='$user'";
  $run_c = mysqli_query($con, $get_c);
  $row_c = mysqli_fetch_array($run_c);
  $c_id = $row_c['customer_id'];

  $get_order = "SELECT * FROM orders WHERE c_id='$c_id'";
  $run_order = mysqli_query($con, $get_order);
  $i=0;

  while($row_order=mysqli_fetch_array($run_order))
  {
    $order_id = $row_order['order_id'];
    $qty = $row_order['qty'];
    $pro_id = $row_order['p_id'];
    $invoice_number = $row_order['invoice_no'];
    $order_date = $row_order['order_date'];
    $status = $row_order['status'];
    $i++;

    $get_pro = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $row_pro = mysqli_fetch_array($run_pro);

    $pro_image = $row_pro['product_image'];
    $pro_title = $row_pro['product_title'];



   ?>
  <tr align="center">
    <td> <?php echo $i; ?></td>
    <td> <?php echo $pro_title; ?>
    <br>
    <img src="../admin_area/product_images/<?php echo $pro_image; ?>" width="50" height="50" />
    </td>
    <td> <?php echo $qty; ?></td>
    <td> <?php echo $invoice_number; ?></td>
    <td> <?php echo $order_date; ?></td>
    <td> <?php echo $status; ?></td>
    <td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
    <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
  </tr>

<?php
  }
?>

</table>