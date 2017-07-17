<h2 style="test-align: center;"> Change Your Password </h2>
<form action="" method="post">
  <table align="center" width="500">
    <tr align="right">
      <td><b>Enter Current Password: </b></td>
      <td><input type="password" name="current_pass" required ></td>
    </tr>
    <tr align="right">
      <td><b>Enter New Password: </b></td>
      <td><input type="password" name="new_pass" required ></td>
    </tr>
    <tr align="right">
      <td><b>Re-enter New Password: </b></td>
      <td><input type="password" name="new_pass_again" required ></td>
    </tr>
    <tr align="right">
      <td colspan="5"><input type="submit" name="change_pass" value="Change Password"></td>
    </tr>
  </table>
</form>
<?php
include("includes/db.php");

if(isset($_POST['change_pass']))
{
  $user = $_SESSION['customer_email'];
  $current_pass = $_POST['current_pass'];
  $new_pass = $_POST['new_pass'];
  $new_again = $_POST['new_pass_again'];

  $sel_pass = "SELECT * FROM customers WHERE customer_pass='$current_pass'
  AND customer_email='$user'";



  $run_pass = mysqli_query($con, $sel_pass);
  $check_pass = mysqli_num_rows($run_pass);

  if($check_pass == 0)
  {
    echo "<script>alert('Your Current Password Is Wrong')</script>";
    exit();
  }

  if($new_pass != $new_again)
  {
    echo "<script>alert('Your New Passwords do not match')</script>";
    exit();
  } else {
    $update = "UPDATE customers SET customer_pass='$new_pass'
    WHERE customer_email='$user'";
    $run_update = mysqli_query($con, $update);
    echo "<script>alert('Password Reset Successfully')</script>";
    echo "<script>window.open('my_account.php', '_self')</script>";
  }
}






 ?>
