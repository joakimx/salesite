<!DOCTYPE>
<?php
include("includes/db.php");
 ?>
<html>
<head>
  <title> Inserting Product </title>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body bgcolor="skyblue">
  <form action="insert_product.php" method="post" enctype="multipart/form-data">
    <table align="center" width="795" border="3px" bgcolor="#187eae">
      <tr align="center">
        <td colspan="7"><h2>Insert new post here</h2></td>
      </tr>
      <tr>
        <td align="right">Product Title</td>
        <td><input type="text" name="product_title" required /></td>
      </tr>
      <tr>
        <td align="right">Product Category</td>
        <td>
            <select name="product_cat">
                <option>Select a cetegory</option>
                <?php
                $get_cats = "SELECT * FROM categories";
                $run_cats = mysqli_query($con, $get_cats);
                while ($row_cats=mysqli_fetch_array($run_cats))
                {
                  $cat_id = $row_cats['cat_id'];
                  $cat_title = $row_cats['cat_title'];
                  echo "<option value='$cat_id'>$cat_title</option>";
                }

                ?>
            </select>
        </td>
      </tr>
      <tr>
        <td align="right">Product Brand</td>
        <td>
            <select name="product_brand">
                <option>Select a Brand</option>
                <?php
                $get_brand = "SELECT * FROM brands";
                $run_brands = mysqli_query($con, $get_brand);
                while ($row_brand=mysqli_fetch_array($run_brands))
                {
                  $brand_id = $row_brand['brand_id'];
                  $brand_title = $row_brand['brand_title'];
                  echo "<option value='$brand_id'>$brand_title</option>";
                }

                ?>
              </select>
        </td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><input type="file" name="product_image" required/></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><input type="text" name="product_price" required/></td>
      </tr>
      <tr>
        <td align="right">Product Description</td>
        <td><textarea name="product_desc" cols="20" rows="10"> </textarea></td>
      </tr>
      <tr>
        <td align="right">Product Keywords</td>
        <td><input type="text" name="product_keywords" size="50" /></td>
      </tr>
      <tr align="right">
        <td colspan="8"><input type="submit" name="insert_post" value="Insert now" /></td>
      </tr>
    </table>
  </form>
</body>
</html>
<?php
echo "Done";
if(isset($_POST['insert_post']))
{
  //Get data fom fields
  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];

  //Get Images
 $product_image = $_FILES['product_image']['name'];
 $product_image_tmp = $_FILES['product_image']['tmp_name'];
 move_uploaded_file($product_image_tmp,"product_images/$product_image");

  $insert_product = "INSERT INTO products(product_cat, product_brand, product_title,
  product_price, product_desc, product_image, product_keywords) VALUES('$product_cat', '$product_brand',
    '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
    $insert_pro = mysqli_query($con, $insert_product);

    if($insert_pro)
    {
      echo "<script>alert('Product Added')</script>";
      echo "<script>window.open('index.php?insert_product','_self')</script>";
    }

}
?>
