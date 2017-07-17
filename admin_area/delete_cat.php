<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<?php
include("includes/db.php");
if (isset($_GET['delete_cat'])) {
  $delete_id = $_GET['delete_cat'];
}

$delete_cat = "DELETE FROM categories WHERE cat_id='$delete_id'";
$run_delete = mysqli_query($con, $delete_cat);

if($run_delete)
{
  echo "<script>window.open('index.php?view_cats', '_self')</script>";
}
	}
?>
