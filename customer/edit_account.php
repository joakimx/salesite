<?php
include("includes/db.php");

$user = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customers WHERE customer_email='$user'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$c_id = $row_customer['customer_id'];
$name = $row_customer['customer_name'];
$email = $row_customer['customer_email'];
$pass = $row_customer['customer_pass'];
$country = $row_customer['customer_country'];
$city = $row_customer['customer_city'];
$image = $row_customer['customer_image'];
$contact = $row_customer['customer_contact'];
$address = $row_customer['customer_address'];


 ?>

        <form action="" method="post" enctype="multipart/form-data">
          <table align="center" width="750px">
            <tr align="center">
              <td colspan="4"><h2>Edit Your Account<h2></td>
            </tr>
            <tr>
              <td align="right">Customer Name: </td>
              <td><input type="text" name="c_name" value="<?php echo $name; ?>" required  /></td>
            </tr>
            <tr>
              <td align="right">Customer Email: </td>
              <td><input type="text" name="c_email" value="<?php echo $email; ?>"  required /></td>
            </tr>
            <tr>
              <td align="right">Customer Password:</td>
              <td><input type="password" name="c_pass" value="<?php echo $pass; ?>"  required /></td>
            </tr>
            <tr>
              <td align="right">Customer Image:</td>
              <td><input type="file" name="c_image" required /><img src="customer_images/<?php echo $image; ?>" width="50" height="50" /></td>
            </tr>
            <tr>
              <td align="right">Customer Country: </td>
              <td>
                <select name= "c_country">
                  <option><?php echo $country; ?></option>
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
              <td><input type="text" name="c_city" value="<?php echo $city; ?>"  required /></td>
            </tr>
            <tr>
              <td align="right">Customer Contact: </td>
              <td><input type="text" name="c_contact" value="<?php echo $contact; ?>"  required /></td>
            </tr>
            <tr>
              <td align="right">Customer Address: </td>
              <td><input type="text" name="c_address" value="<?php echo $address; ?>"  required /></td>
            </tr>
            <tr align="center">
              <td colspan="6"><input type="submit" name="update" value="Update Account" /></td>
            </tr>
          </table>
        </form>
<?php
if(isset($_POST['update']))
{
  $ip = getIP();
  $customer_id = $c_id;
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];

  move_uploaded_file($c_image_tmp, "customer_images/$c_image");
  $update_c = "UPDATE customers SET customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass',
  customer_country='$c_country', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address',
  customer_image='$c_image' WHERE customer_id='$customer_id'";

  $run_update = mysqli_query($con, $update_c);
  if ($run_update) {
    echo "<script>alert('Account updated successfully!')</script>";
    echo "<script>window.open('my_account.php', '_self')</script>";
  } else {
    echo "Query failed!";
  }
}
?>
