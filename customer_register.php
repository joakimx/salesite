<!DOCTYPE>
<?php
  session_start();
  include("functions/function.php");
  include("includes/db.php");
?>
<html>
<head>
  <title> Sales site </title>
  <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
  <!-- main container  -->
  <div class="main_wrapper">
    <div class="header_wrapper">
      <a href="index.php"> <img id="logo" src="images/logo.gif"> </a>
    </div>
    <!-- Nav bar -->
    <div class="menubar">
      <ul id="menu">
        <li><a href="index.php"> Home </a></li>
        <li><a href="all_products.php"> All Products </a></li>
        <li><a href="customer/my_account.php"> My Account </a></li>
        <li><a href="#"> Sign Up </a></li>
        <li><a href="cart.php"> Cart </a></li>
        <li><a href="#"> Contact Us </a></li>
      </ul>
      <!-- Search bar -->
      <div id="form">
        <form method="GET" action="results.php" enctype="multipart/form-data">
          <input type="text" name="user_query" placeholder="Search for products" />
          <input type="submit" name="search" value="search" />
        </form>
      </div>
    </div>

    <!-- Page content -->
    <div class="content_wrapper">
      <!-- Side bar or page -->
      <div id="sidebar">
        <div id="sidebar_title"> Categories </div>
        <ul id="cats">
          <?php getCats(); ?>
        </ul>

        <div id="sidebar_title"> Brands </div>
        <ul id="cats">
          <?php getBrands(); ?>
        </ul>

      </div>
      <!-- Main content area -->
      <div id="content_area">
        <?php cart(); ?>
        <div id="shopping_cart">
          <span style="float:right; font-size: 18px; padding: 5px; line-height: 40px;">
            Welcome Guest <b style="color:yellow">Shopping Cart - </b>
            Total Items: <?php total_items(); ?>
            Total Price: $ <?php total_price(); ?>
            <a href="cart.php">Go to Cart</a>
          </span>
        </div>
        <form action="customer_register.php" method="post" enctype="multipart/form-data">
          <table align="center" width="750px">
            <tr align="center">
              <td colspan="4"><h2>Create an Account<h2></td>
            </tr>
            <tr>
              <td align="right">Customer Name: </td>
              <td><input type="text" name="c_name" required  /></td>
            </tr>
            <tr>
              <td align="right">Customer Email: </td>
              <td><input type="text" name="c_email" required /></td>
            </tr>
            <tr>
              <td align="right">Customer Password:</td>
              <td><input type="password" name="c_pass" required /></td>
            </tr>
            <tr>
              <td align="right">Customer Image:</td>
              <td><input type="file" name="c_image" required /></td>
            </tr>
            <tr>
              <td align="right">Customer Country: </td>
              <td>
                <select name= "c_country">
                	<option>Afghanistan</option>
                	<option>Åland Islands</option>
                	<option>Albania</option>
                	<option>Algeria</option>
                	<option>American Samoa</option>
                	<option>Andorra</option>
                	<option>Angola</option>
                	<option>Anguilla</option>
                	<option>Antarctica</option>
                	<option>Antigua and Barbuda</option>
                	<option>Argentina</option>
                	<option>Armenia</option>
                	<option>Aruba</option>
                	<option>Australia</option>
                	<option>Austria</option>
                	<option>Azerbaijan</option>
                	<option>Bahamas</option>
                	<option>Bahrain</option>
                	<option>Bangladesh</option>
                	<option>Barbados</option>
                	<option>Belarus</option>
                	<option>Belgium</option>
                	<option>Belize</option>
                	<option>Benin</option>
                	<option>Bermuda</option>
                	<option>Bhutan</option>
                	<option>Bolivia, Plurinational State of</option>
                	<option>Bonaire, Sint Eustatius and Saba</option>
                  <option>Bosnia and Herzegovina</option>
                  <option>Botswana</option>
                  <option>Bouvet Island</option>
                	<option>Brazil</option>
                	<option>British Indian Ocean Territory</option>
                	<option>Brunei Darussalam</option>
                	<option>Bulgaria</option>
                	<option>Burkina Faso</option>
                	<option>Burundi</option>
                	<option>Cambodia</option>
                	<option>Cameroon</option>
                	<option>Canada</option>
                	<option>Cape Verde</option>
                	<option>Cayman Islands</option>
                	<option>Central African Republic</option>
                	<option>Chad</option>
                	<option>Chile</option>
                	<option>China</option>
                	<option>Christmas Island</option>
                	<option>Cocos (Keeling) Islands</option>
                	<option>Colombia</option>
                	<option>Comoros</option>
                	<option>Congo</option>
                	<option>Congo, the Democratic Republic of the</option>
                	<option>Cook Islands</option>
                	<option>Costa Rica</option>
                	<option>Côte d'Ivoire</option>
                	<option>Croatia</option>
                	<option>Cuba</option>
                	<option>Curaçao</option>
                	<option>Cyprus</option>
                	<option>Czech Republic</option>
                	<option>Denmark</option>
                	<option>Djibouti</option>
                	<option>Dominica</option>
                	<option>Dominican Republic</option>
                	<option>Ecuador</option>
                	<option>Egypt</option>
                	<option>El Salvador</option>
                	<option>Equatorial Guinea</option>
                	<option>Eritrea</option>
                	<option>Estonia</option>
                	<option>Ethiopia</option>
                	<option>Falkland Islands (Malvinas)</option>
                	<option>Faroe Islands</option>
                	<option>Fiji</option>
                	<option>Finland</option>
                	<option>France</option>
                	<option>French Guiana</option>
                	<option>French Polynesia</option>
                	<option>French Southern Territories</option>
                	<option>Gabon</option>
                	<option>Gambia</option>
                	<option>Georgia</option>
                	<option>Germany</option>
                	<option>Ghana</option>
                	<option>Gibraltar</option>
                	<option>Greece</option>
                	<option>Greenland</option>
                	<option>Grenada</option>
                	<option>Guadeloupe</option>
                	<option>Guam</option>
                	<option>Guatemala</option>
                	<option>Guernsey</option>
                	<option>Guinea</option>
                	<option>Guinea-Bissau</option>
                	<option>Guyana</option>
                	<option>Haiti</option>
                	<option>Heard Island and McDonald Islands</option>
                	<option>Holy See (Vatican City State)</option>
                	<option>Honduras</option>
                	<option>Hong Kong</option>
                	<option>Hungary</option>
                	<option>Iceland</option>
                	<option>India</option>
                	<option>Indonesia</option>
                	<option>Iran, Islamic Republic of</option>
                	<option>Iraq</option>
                	<option>Ireland</option>
                	<option>Isle of Man</option>
                	<option>Israel</option>
                	<option>Italy</option>
                	<option>Jamaica</option>
                	<option>Japan</option>
                	<option>Jersey</option>
                	<option>Jordan</option>
                	<option>Kazakhstan</option>
                	<option>Kenya</option>
                	<option>Kiribati</option>
                	<option>Korea, Democratic People's Republic of</option>
                	<option>Korea, Republic of</option>
                	<option>Kuwait</option>
                	<option>Kyrgyzstan</option>
                	<option>Lao People's Democratic Republic</option>
                	<option>Latvia</option>
                	<option>Lebanon</option>
                	<option>Lesotho</option>
                	<option>Liberia</option>
                	<option>Libya</option>
                	<option>Liechtenstein</option>
                	<option>Lithuania</option>
                	<option>Luxembourg</option>
                	<option>Macao</option>
                	<option>Macedonia, the former Yugoslav Republic of</option>
                	<option>Madagascar</option>
                	<option>Malawi</option>
                	<option>Malaysia</option>
                	<option>Maldives</option>
                	<option>Mali</option>
                	<option>Malta</option>
                	<option>Marshall Islands</option>
                	<option>Mauritania</option>
                	<option>Mauritius</option>
                	<option>Mayotte</option>
                	<option>Mexico</option>
                	<option>Micronesia, Federated States of</option>
                	<option>Moldova, Republic of</option>
                	<option>Monaco</option>
                	<option>Mongolia</option>
                	<option>Montenegro</option>
                	<optionn>Montserrat</option>
                	<option>Morocco</option>
                	<option>Mozambique</option>
                	<option>Myanmar</option>
                	<option>Namibia</option>
                	<option>Nauru</option>
                	<option>Nepal</option>
                	<option>Netherlands</option>
                	<option>New Caledonia</option>
                	<option>New Zealand</option>
                	<option>Nicaragua</option>
                	<option>Niger</option>
                	<option>Nigeria</option>
                	<option>Niue</option>
                	<option>Norfolk Island</option>
                	<option>Northern Mariana Islands</option>
                	<option>Norway</option>
                	<option>Oman</option>
                	<option>Pakistan</option>
                	<option>Palau</option>
                	<option>Palestinian Territory, Occupied</option>
                	<option>Panama</option>
                	<option>Papua New Guinea</option>
                	<option>Paraguay</option>
                	<option>Peru</option>
                	<option>Philippines</option>
                	<option>Pitcairn</option>
                	<option>Poland</option>
                	<option>Portugal</option>
                	<option>Puerto Rico</option>
                	<option>Qatar</option>
                	<option>Réunion</option>
                	<option>Romania</option>
                	<option>Russian Federation</option>
                	<option>Rwanda</option>
                	<option>Saint Barthélemy</option>
                	<option>Saint Helena, Ascension and Tristan da Cunha</option>
                	<option>Saint Kitts and Nevis</option>
                	<option>Saint Lucia</option>
                	<option>Saint Martin (French part)</option>
                	<option>Saint Pierre and Miquelon</option>
                	<option>Saint Vincent and the Grenadines</option>
                	<option>Samoa</option>
                	<option>San Marino</option>
                	<option>Sao Tome and Principe</option>
                	<option>Saudi Arabia</option>
                	<option>Senegal</option>
                	<option>Serbia</option>
                	<option>Seychelles</option>
                	<option>Sierra Leone</option>
                	<option>Singapore</option>
                	<option>Sint Maarten (Dutch part)</option>
                	<option>Slovakia</option>
                	<option>Slovenia</option>
                	<option>Sos</option>
                	<option>Somalia</option>
                	<option>South Africa</option>
                	<option>South Georgia and the South Sandwich Islands</option>
                	<option>South Sudan</option>
                	<option>Spain</option>
                	<option>Sri Lanka</option>
                	<option>Sudan</option>
                	<option>Suriname</option>
                	<option>Svalbard and Jan Mayen</option>
                	<option>Swion</option>
                	<option>Sweden</option>
                	<option>Switzerland</option>
                	<option>Syrian Arab Republic</option>
                	<option>Taiwan, Province of China</option>
                	<option>Tajikistan</option>
                	<option>Tanzania, United Republic of</option>
                	<option>Thailand</option>
                	<option>Timor-Leste</option>
                	<option>Togo</option>
                	<option>Ton</option>
                	<option>Tonga</option>
                	<option>Trinidad and Tobago</option>
                	<option>Tunisia</option>
                	<option>Turkey</option>
                	<option>Turkmenistan</option>
                	<option>Turks and Caicos Islands</option>
                	<option>Tuvalu</option>
                	<option>Uganda</option>
                	<option>Ukn</option>
                	<option>United Arab Emirates</option>
                	<option>United Kingdom</option>
                	<option>United States</option>
                	<option>United States Minor Outlying Islands</option>
                	<option>Uruguay</option>
                	<option>Uzbekistan</option>
                	<option>Vanuatu</option>
                	<option>Venezuela, Bolivarian Republic of</option>
                	<option>Vion</option>
                	<option>Virgin Islands, British</option>
                	<option>Virgin Islands, U.S.</option>
                	<option>Wallis and Futuna</option>
                	<option>Western Sahara</option>
                	<option>Yemen</option>
                	<option>Zambia</option>
                	<option>Zimbabwe</option>
                </select>
              </td>
            <tr>
              <td align="right">Customer City: </td>
              <td><input type="text" name="c_city" required /></td>
            </tr>
            <tr>
              <td align="right">Customer Contact: </td>
              <td><input type="text" name="c_contact" required /></td>
            </tr>
            <tr>
              <td align="right">Customer Address: </td>
              <td><input type="text" name="c_address" required /></td>
            </tr>
            <tr align="center">
              <td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
            </tr>
          </table>
    </div>
  </form>
    <div id="footer">
      <h2 style="text-align: center; padding-top: 30px;">
        &copy; 2017 Created by Loven Costa
      </h2>
    </div>
  </div>
  <!-- Main container ends -->
</body>
</html>
<?php
if(isset($_POST['register']))
{
  $ip = getIP();
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];

  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
  $insert_c = "INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image)
  VALUES ('$ip', '$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image')";

  $run_c = mysqli_query($con, $insert_c);

  $sel_cart = "SELECT * FROM cart WHERE  ip_add='$ip'";
  $run_cart = mysqli_query($con, $sel_cart);
  $check_cart = mysqli_num_rows($run_cart);

  if($check_cart == 0)
  {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('Registration Successful!')</script>";
    echo "<script>window.open('customer/my_account.php', '_self')</script>";
  } else {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('Registration Successful!')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  }

}
?>
