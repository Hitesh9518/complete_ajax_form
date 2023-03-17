<?php
require ('config.php');
// $sql1 = "select * from city";
// $result1 = mysqli_query($con,$sql1);
// while($row = mysqli_fetch_array($result1)){
//     $state = $row['state_id'];
// }


$sql = "select * from city where state_id =" .$_POST['state']."";
// $sql = "select * from city";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=" . $row['city_id'] . ">" . $row['city_name'] . "</option>";
    }
} else {
    echo "<option value=''>City not available</option>";
}
?>