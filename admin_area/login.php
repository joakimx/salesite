<!doctype html>
<?php
$error = ""; ?>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Admin Login Form</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="styles/login_style.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<div class="login">
  <h2 style="color: LightSteelBlue; text-align: center; text-weight: bolder;">
    <?php
    if (isset($_GET['not_admin']) AND $_GET['not_admin'] == 'You\'re not an Administrator!' ) {
      echo @$_GET['not_admin'];
    } else if (! ($_GET['not_admin'] == 'You\'re not an Administrator!')) {
      echo @$_GET['not_admin'];
      echo @$_GET['logged_out'];
    }
    ?>
  </h2>
  <h3 style="color: LightSteelBlue; text-align: center; text-weight: bolder;">
    <?php if(isset($_GET['not_admin']) OR empty($_GET['not_admin']))
    {
      echo "Please login to continue...";
    }
    ?>
  </h3>
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="username" placeholder="Admin Username" required="required" />
      <input type="password" name="password" placeholder="Admin Password" required="required" />
      <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Admin Login</button>
    </form>
</div>
<body>
  <script src="js/scripts.js"></script>
</body>
</html>
<?php
session_start();
include("includes/db.php");

if(isset($_POST['login']))
{
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $sel_user = "SELECT * FROM admins WHERE user_email='$username' AND user_pass='$password'";
  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);

  if($check_user==0)
  {
    $error = "Incorrect Admin Username/Password!";
    echo "<script>window.open('login.php?not_admin=$error', '_self')</script>";
  } else {
    $_SESSION['user_email'] = $username;
    echo $username;
    echo "<script>window.open('index.php?logged_in=You\'ve successfully logged in!', '_self')</script>";
  }
}
 ?>
