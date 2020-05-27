<?php
session_start();
$cid = $_SESSION['customer_id'];
echo "you are login with customer id " .$cid. "</br>";

$vid = $_GET['vid'];

//echo $vid;
//if(!isset($_GET['id'])){
//    echo "error";
//}
$_SESSION['vehicle_id'] = $vid;
echo "your vehicle id is " .$_SESSION['vehicle_id'];
require_once('dbConnection.php');

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function u($string="") {
    return urlencode($string);
}
?>
<?php
function h($string=""){
    return htmlspecialchars($string);
}


#echo $vid;
require_once('dbConnection.php');
?>
<?php
$sql ="select a.driver_id, a.driver_license, a.driver_firstname, a.driver_lastname, a.driver_birthdate, b.vehicle_id, b.driver_id,
       c.vehicle_id
    from driver a join vehicle_driver b on a.driver_id = b.driver_id join vehicle c on b.vehicle_id = c.vehicle_id
    where c.vehicle_id = '". mysqli_real_escape_string($db,$vid) ."'";

 $result = mysqli_query($db, $sql);
 #$subjects = mysqli_fetch_assoc($result);
 #print_r($subjects);
?>
<li><a href="AddDriver.php">Add driver</a></li>
<link rel="stylesheet" media = "all" href="staff.css"/>
<table class="list">
    <tr>
        <th>Driver id</th>
        <th>Driver license</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Birthday</th>
        <th>Vehicle_id</th>
    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['driver_id']);?></td>
            <td><?php echo h($subjects['driver_license']);?></td>
            <td><?php echo h($subjects['driver_firstname']);?></td>
            <td><?php echo h($subjects['driver_lastname']);?></td>
            <td><?php echo h($subjects['driver_birthdate']);?></td>
            <td><?php echo h($subjects['vehicle_id']);?></td>

        </tr>
    <?php } ?>


    <?php mysqli_free_result($result)?>

</table>


