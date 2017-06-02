<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<?php
include("includes/db.php");

if (isset($_GET['edit_cat'])) {
  $cat_id = $_GET['edit_cat'];
  $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";

  $run_cat = mysqli_query($con, $get_cat);
  $row_cat = mysqli_fetch_array($run_cat);

  $cat_id = $row_cat['cat_id'];
  $cat_title = $row_cat['cat_title'];
}
?>


<form action="" method="post" style="padding:40px;">
  <b>Update Category</b>

  <input type="text" name="new_cat" value="<?php echo $cat_title; ?>" />
  <input type="submit" name="update_cat" value="Update Category" />

</form>

<?php
include("includes/db.php");

if(isset($_POST['update_cat'])){
  $update_id = $cat_id;
  $update_title = $_POST['new_cat'];
  $update_cat = "UPDATE categories SET cat_title='$update_title' WHERE cat_id='$update_id'";

  $run_cat = mysqli_query($con, $update_cat);

  if($run_cat)
  {
    echo "<script>window.open('index.php?view_cats', '_self')</script>";
  } else {
    echo "Database problems";
  }
}

	}
 ?>
