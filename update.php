<?php
require('config.php');

$id = $_GET['id'];

$result = mysqli_query($con, "select * from teachar_registration where id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $hobbies = explode(",", $row['hobbies']);
        $address = $row['address'];
        $graduation = $row['graduation'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $city = $row['city'];
        $state = $row['state'];
        $pincode = $row['pincode'];


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <style>
                .success {
                    color: green;
                }

                .error {
                    color: #FF0000;
                }
            </style>
        </head>

        <body>
            <center>
                <br><br>
                <h2>Update Teacher Data</h2>
                <p id="msg" class="success error"></p>

                <form method="POST" autocomplete="off" id="teachar_update_form">
                    <table border="2">
                        <tr>
                            <!-- <td>Id :</td> -->
                            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                        </tr>
                        <tr>
                            <td>First Name :</td>
                            <td><input type="text" name="fname" value="<?php echo $fname; ?>"></td>
                        </tr>
                        <tr>
                            <td>Middle Name :</td>
                            <td><input type="text" name="mname" value="<?php echo $mname; ?>"></td>
                        </tr>
                        <tr>
                            <td>Last Name :</td>
                            <td><input type="text" name="lname" value="<?php echo $lname; ?>"></td>
                        </tr>
                        <tr>
                            <td>DOB :</td>
                            <td><input type="date" name="dob" value="<?php echo $dob; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td><input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>MALE
                                <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>FEMALE
                            </td>
                        </tr>
                        <tr>
                            <td>Hobbies :</td>
                            <td><input type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array("Reading", $hobbies)) echo "checked"; ?>>Reading
                                <input type="checkbox" name="hobbies[]" value="Cycling" <?php if (in_array("Cycling", $hobbies)) echo "checked"; ?>>Cycling
                                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (in_array("Travelling", $hobbies)) echo "checked"; ?>>Travelling
                            </td>
                        </tr>
                        <tr>
                            <td>Graduation :</td>
                            <td><input type="radio" name="graduation" value="BCA" <?php if ($graduation == "BCA") echo "checked"; ?>>BCA
                                <input type="radio" name="graduation" value="BCOM" <?php if ($graduation == "BCOM") echo "checked"; ?>>BCOM
                                <input type="radio" name="graduation" value="BBA" <?php if ($graduation == "BBA") echo "checked"; ?>>BBA
                            </td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td><textarea cols="21" rows="3" name="address"><?php echo $address; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Mobile No :</td>
                            <td><input type="text" name="mobile" value="<?php echo $mobile; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                        </tr>
                        <tr>
                            <td>State :</td>
                            <td>
                                <input type="hidden" id="state_id" value="<?php echo $state; ?>">
                                <select id="state_dropdown" name="state">
                                    <option value="">-- Select State --</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>City :</td>
                            <td>
                                <input type="hidden" id="city_id" value="<?php echo $city; ?>">
                                <select id="city_dropdown" name="city">
                                    <option value="">-- Select City --</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pincode No :</td>
                            <td><input type="text" name="pincode" value="<?php echo $pincode; ?>"></td>
                        </tr>
                    </table><br>
                    <button type="submit" name="update" id="submit">Update</button>
                    <a href="display.php"><button type="button">Back</button></a>
                </form>
            </center>
    <?php
    }
}
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
        </body>

        </html>