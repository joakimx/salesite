<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<table width="795" align="center" bgcolor="pink">
  <tr>
    <td colspan="6"><h2 align="center"> View All Registered Customers</h2></td>
  </tr>

  <tr align="center" border="2" bgcolor="#DAF7A6">
    <th>S.N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Picture</th>
    <th>Delete</th>
  </tr>

  <?php
  include("includes/db.php");
  $get_c = "SELECT * FROM customers";
  $run_c = mysqli_query($con, $get_c);
  $i=0;

  while($row_c=mysqli_fetch_array($run_c))
  {
    $c_id = $row_c['customer_id'];
    $c_name = $row_c['customer_name'];
    $c_email = $row_c['customer_email'];
    $c_image = $row_c['customer_image'];
    $i++;

   ?>
  <tr align="center">
    <td> <?php echo $i; ?></td>
    <td> <img src="../customer/customer_images/<?php echo $c_image; ?>" width="50" height="50"/></td>
    <td> <?php echo $c_name; ?></td>
    <td> <?php echo $c_email; ?></td>
    <td><a href="delete_customer.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
  </tr>
<?php
  }
	}
   ?>


</table>
