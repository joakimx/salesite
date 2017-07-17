<h2 style="test-align: centre; color: white;">Do you really want to delete your account?</h2>

<form action="" method="post">
  <br>
  <input type="submit" name="yes" value="yes" />
  <input type="submit" name="no" value="no" />
</form>
<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes']))
{
  $delete_customer = "DELETE FROM customers WHERE customer_email='$user'";
  $run_customer = mysqli_query($con, $delete_customer);
  echo "<script>alert('Your Account Has Been Deleted!')</script>";
  echo "<script>window.open('../index.php', '_self')</script>";
} else if (isset($_POST['no'])) {
  echo "<script>alert('Please Dont Joke again')</script>";
  echo "<script>window.open('my_account.php', '_self')</script>";
}

 ?>
