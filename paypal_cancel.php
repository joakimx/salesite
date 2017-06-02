<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<body>

<h1>Transaction Was Cancelled, <?php echo $_SESSION['customer_email']; ?></h1>
<h2><a href="customer/my_account.php">Go to your account</a></h2>
</body>
</html>
