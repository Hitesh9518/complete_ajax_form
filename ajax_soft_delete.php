<?php
    require ('config.php');
    
    $id = $_POST['id'];
    
        $result = mysqli_query($con, "update teachar_registration set status = 0 where id = '$id'");
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        // echo "<script>window.location.href='display.php';</script>";
    
?>