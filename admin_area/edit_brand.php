<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<?php
include("includes/db.php");

if (isset($_GET['edit_brand'])) {
  $brand_id = $_GET['edit_brand'];
  $get_brand = "SELECT * FROM brands WHERE brand_id='$brand_id'";

  $run_brand = mysqli_query($con, $get_brand);
  $row_brand = mysqli_fetch_array($run_brand);

  $brand_id = $row_brand['brand_id'];
  $brand_title = $row_brand['brand_title'];
}
?>

<form action="" method="post" style="padding:40px;">
  <b>Edit Brand</b>

  <input type="text" name="new_brand" value="<?php echo $brand_title; ?>" />
  <input type="submit" name="edit_brand" value="Add Brand" />

</form>

<?php
include("includes/db.php");

if(isset($_POST['edit_brand'])){
  $new_brand = $_POST['new_brand'];
  $update_brand = "UPDATE brands SET brand_title='$new_brand' WHERE brand_id='$brand_id'";
  $run_brand = mysqli_query($con, $update_brand);

  if($run_brand)
  {
    echo "<script>window.open('index.php?view_brands', '_self')</script>";
  }
}

	}
 ?>
