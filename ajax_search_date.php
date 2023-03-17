<?php
    require('config.php');

    // $search = $_POST['search'];
    $search_date = $_POST['search_date'];

    $sql = "SELECT
teachar_registration.id,teachar_registration.fname,teachar_registration.mname,teachar_registration.lname,teachar_registration.dob,teachar_registration.gender,teachar_registration.hobbies,teachar_registration.address,teachar_registration.graduation,teachar_registration.mobile,teachar_registration.email,teachar_registration.state,teachar_registration.city,teachar_registration.pincode,
        state.state_id,state.state_name,
        city.city_id,city.city_name
        FROM teachar_registration
        INNER JOIN state
        ON teachar_registration.state = state.state_id
        INNER JOIN city
        ON teachar_registration.city = city.city_id 
        where teachar_registration.dob like '%$search_date%' AND teachar_registration.status = 1
";

    // $sql = "SELECT * from teachar_registration where fname like '%$search%' OR mname like '%$search%' OR lname like '%$search%' OR mobile like '%$search%' OR email like '%$search%' OR pincode like '%$search%' ";

    $result = mysqli_query($con, $sql);
    $output ="";

    if(mysqli_num_rows($result) > 0 ){
        $output = "<table border='2'>
        <thead>
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
        </thead>";

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

            $output .= "<tbody id='table'>
            <tr>
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
                </tr>
                
                </tbody>";

        }
    }
    else{
        echo "<span class='error'>No Data Found...!</span>";
    }

    $output .= "</table>";
    echo $output;
?>