<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<?php
include("includes/db.php");
if (isset($_GET['delete_c'])) {
  $delete_id = $_GET['delete_c'];
}

$delete_customer = "DELETE FROM customers WHERE customer_id='$delete_id'";
$run_delete = mysqli_query($con, $delete_customer);

if($run_delete)
{
  echo "<script>window.open('index.php?view_customers', '_self')</script>";
}
	}
?>
