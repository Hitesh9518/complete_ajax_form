<?php
require('config.php');
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $fname = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    // $dob = $_POST['dob'];
    // $gender = $_POST['gender'];
    // $hobbies = implode(',',$_POST['hobbies']);
    // $address = $_POST['address'];
    // $graduation = $_POST['graduation'];
    // $mobile = $_POST['mobile'];
    // $email = $_POST['email'];
    // $state = $_POST['state'];
    // $city = $_POST['city'];
    // $pincode = $_POST['pincode'];

    $error = array();

    // fname
    if (empty($_POST['fname'])) {

        $error[] = "First Name is Required";
    } else {
        $fname = $_POST['fname'];

        if (!preg_match("/^[a-zA-z]*$/", $fname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $fname = $_POST['fname'];
        }
    }

    // mname
    if (empty($_POST['mname'])) {

        $error[] = "Middle Name is Required";
    } else {
        $mname = $_POST['mname'];

        if (!preg_match("/^[a-zA-z]*$/", $mname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $mname = $_POST['mname'];
        }
    }

    // lname
    if (empty($_POST['lname'])) {

        $error[] = "Last Name is Required";
    } else {
        $lname = $_POST['lname'];

        if (!preg_match("/^[a-zA-z]*$/", $lname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $lname = $_POST['lname'];
        }
    }

    // dob
    if (empty($_POST['dob'])) {
        $error[] = "DOB is Required";
    } else {
        $dob = $_POST['dob'];
    }

    // gender
    if (empty($_POST['gender'])) {
        $error[] = "Gender is Required";
    } else {
        $gender = $_POST['gender'];
    }

    // hobbies
    if (empty($_POST['hobbies'])) {
        $error[] = "Hobbies is Required";
    } else {
        $hobbies = implode(",", $_POST['hobbies']);
    }

    // graduation
    if (empty($_POST['graduation'])) {
        $error[] = "Graduation is Required";
    } else {
        $graduation = $_POST['graduation'];
    }

    // address
    if (empty($_POST['address'])) {
        $error[] = "Address is Required";
    } else {
        $address = $_POST['address'];
    }

    // mobile
    if (empty($_POST['mobile'])) {
        $error[] = "Mobile No is Required";
    } else {
        $mobile = $_POST['mobile'];

        if (!preg_match("/^[0-9]*$/", $mobile)) {
            $error[] = "Only Numeric Value Allowed";
        }
        if (strlen($mobile) != 10) {
            $error[] = "Mobile no must contain 10 digits";
        }
    }

    // email
    if (empty($_POST['email'])) {
        $error[] = "Email is Required";
    } else {
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid Email Format";
        }
    }

    // city
    if (empty($_POST['city'])) {
        $error[] = "City is Required";
    } else {
        $city = $_POST['city'];
    }

    // state
    if (empty($_POST['state'])) {
        $error[] = "State is Required";
    } else {
        $state = $_POST['state'];
    }

    // pincode
    if (empty($_POST['pincode'])) {
        $error[] = "Pincode No is Required";
    } else {
        $pincode = $_POST['pincode'];

        if (!preg_match("/^[0-9]*$/", $pincode)) {
            $error[] = "Only Numeric Value Allowed";
        }
        if (strlen($pincode) != 6) {
            $error[] = "Pincode no must contain 6 digits";
        }
    }
    // echo "<center>";

    $count = count($error);
    if ($count > 0) {
        foreach ($error as $value) {
            echo "<span class='error'>" . $value . "</span><br>";
        }
    } else {
        $checkEmail = "select * from teachar_registration where email = '$email'";
        $result = mysqli_query($con,$checkEmail);
        $row = mysqli_fetch_array($result,MYSQLI_NUM);

        if($row[0] > 0){
            echo "<span class='error'>Email Already Exist...!</span>";
        exit();
        }else{

        $insert = "insert into teachar_registration values (NULL,'$fname','$mname','$lname','$dob','$gender','$hobbies','$address','$graduation','$mobile','$email','$city','$state','$pincode',1);";
        $result = mysqli_query($con, $insert);

        echo "<span class='success'>Data Inserted...!</span>";
        }
    }
}
?>