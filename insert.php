<?php
require('config.php');
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
        <h2>Add Teacher Data</h2>
        <p id="msg" class="success error"></p>
        <form method="POST" autocomplete="off" id="teachar_form">
            <table border="2">
                <tr>
                    <td>First Name :</td>
                    <td><input type="text" name="fname"></td>
                </tr>
                <tr>
                    <td>Middle Name :</td>
                    <td><input type="text" name="mname"></td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td>DOB :</td>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td><input type="radio" name="gender" value="Male">MALE
                        <input type="radio" name="gender" value="Female">FEMALE
                    </td>
                </tr>
                <tr>
                    <td>Hobbies :</td>
                    <td><input type="checkbox" name="hobbies[]" value="Reading">Reading
                        <input type="checkbox" name="hobbies[]" value="Cycling">Cycling
                        <input type="checkbox" name="hobbies[]" value="Travelling">Travelling
                    </td>
                </tr>
                <tr>
                    <td>Graduation :</td>
                    <td><input type="radio" name="graduation" value="BCA">BCA
                        <input type="radio" name="graduation" value="BCOM">BCOM
                        <input type="radio" name="graduation" value="BBA">BBA
                    </td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><textarea cols="21" rows="3" name="address"></textarea></td>
                </tr>
                <tr>
                    <td>Mobile No :</td>
                    <td><input type="text" name="mobile"></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>State :</td>
                    <td>
                        <select id="state" name="state">
                            <option value="">-- Select State --</option>
                            <?php
                            $sql = "select * from state ";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['state_id'] . ">" . $row['state_name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>State not available</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>City :</td>
                    <td>
                        <select id="city" name="city">
                            <option value="">-- Select City --</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pincode No :</td>
                    <td><input type="text" name="pincode"></td>
                </tr>
            </table><br>
            <button type="submit" name="insert" id="submit">Insert</button>
            <a href="display.php"><button type="button">Display</button></a>
        </form>
    </center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
</body>

</html>