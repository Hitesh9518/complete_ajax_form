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
        <h2>Search Data</h2>
        <br><br>
        <div class="search-bar">
            <label>Search : </label>
            <input type="text" id="search">
            <input type="date" id="search_date">
        </div>
        <br><br>
        <form action="">
            <table border="2">
                <!-- <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fname</th>
                        <th>Mname</th>
                        <th>Lname</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Address</th>
                        <th>Graduation</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Operations</th>
                    </tr>
                </thead> -->
                <tbody id="table">
                    <?php
                    require('config.php');

                    // $sql = "select * from teachar_registration";
                    $sql = "SELECT
teachar_registration.id,teachar_registration.fname,teachar_registration.mname,teachar_registration.lname,teachar_registration.dob,teachar_registration.gender,teachar_registration.hobbies,teachar_registration.address,teachar_registration.graduation,teachar_registration.mobile,teachar_registration.email,teachar_registration.state,teachar_registration.city,teachar_registration.pincode,
        state.state_id,state.state_name,
        city.city_id,city.city_name
        FROM teachar_registration
        INNER JOIN state
        ON teachar_registration.state = state.state_id
        INNER JOIN city
        ON teachar_registration.city = city.city_id 
        where teachar_registration.status = 1
";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                        $id = $row['id'];
                        $fname = $row['fname'];
                        $mname = $row['mname'];
                        $lname = $row['lname'];
                        $dob = date("d-m-Y", strtotime($row['dob']));
                        $gender = $row['gender'];
                        $hobbies = $row['hobbies'];
                        $address = $row['address'];
                        $graduation = $row['graduation'];
                        $mobile = $row['mobile'];
                        $email = $row['email'];
                        $state = $row['state_name'];
                        $city = $row['city_name'];
                        $pincode = $row['pincode'];

                        echo "<tr>
                            <td>$id</td>
                            <td>$fname</td>
                            <td>$mname</td>
                            <td>$lname</td>
                            <td>$dob</td>
                            <td>$gender</td>
                            <td>$hobbies</td>
                            <td>$address</td>
                            <td>$graduation</td>
                            <td>$mobile</td>
                            <td>$email</td>
                            <td>$state</td>
                            <td>$city</td>
                            <td>$pincode</td>
                            <td><a href='update.php?id=$row[id]'><input type='button' value='Edit'></a>
                            <button class='delete-btn' data-id='$row[id]'>Delete</button>
                                </td>
                            </tr>";
                    }

                    ?>
                </tbody>
            </table>
        </form>
        <br>
        <a href="display.php"><button type="button">Back</button></a>
    </center>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
</body>

</html>