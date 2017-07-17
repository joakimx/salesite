<?php
if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('login.php?not_admin=You\'re not an Administrator!', '_self')</script>";
} else {
?>

<table width="795" align="center" bgcolor="pink">
  <tr>
    <td colspan="6"><h2 align="center"> View All The Brands Here</h2></td>
  </tr>

  <tr align="center" border="2" bgcolor="#DAF7A6">
    <th>Brand ID</th>
    <th>Brand Title</th>
    <th>Edit Brand</th>
    <th>Delete Brand</th>
  </tr>

  <?php
  include("includes/db.php");
  $get_brand = "SELECT * FROM brands";
  $run_brand = mysqli_query($con, $get_brand);
  $i=0;

  while($row_brand=mysqli_fetch_array($run_brand))
  {
    $brand_id = $row_brand['brand_id'];
    $brand_title = $row_brand['brand_title'];
    $i++;

   ?>
  <tr align="center">
    <td> <?php echo $i; ?></td>
    <td> <?php echo $brand_title; ?></td>
    <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
    <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
  </tr>

<?php
  }
	}
   ?>


</table>
