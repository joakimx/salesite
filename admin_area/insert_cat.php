<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<form action="" method="post" style="padding:40px;">
  <b>Insert New Category</b>

  <input type="text" name="new_cat" required />
  <input type="submit" name="add_cat" value="Add Category" />

</form>

<?php
include("includes/db.php");

if(isset($_POST['add_cat'])){
  $new_cat = $_POST['new_cat'];
  $insert_cat = "INSERT INTO categories (cat_title) VALUES ('$new_cat')";
  $run_cat = mysqli_query($con, $insert_cat);

  if($run_cat)
  {
    echo "<script>window.open('index.php?view_cats', '_self')</script>";
  }
}
	}
 ?>
