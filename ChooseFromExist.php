<?php
/**
 *db_project
 *ChooseFromExist.php
 *Description
 *Created on 5/5/20 7:11 下午
 *Author: Esmee Zhang
 */
?>
<?php
session_start();
$id = $_SESSION['customer_id'];
echo "you are login with customer id " .$id. "</br>";
echo "your vehicle id is" .$_SESSION["vehicle_id"] ."</br>";
require_once('dbConnection.php');
?>
<?php
function h($string=""){
    return htmlspecialchars($string);
}
?>
<?php
$sql = "select * from driver";
$result = mysqli_query($db, $sql);
?>
<table class="list">
    <link rel="stylesheet" media = "all" href="staff.css"/>
    <tr>
        <th>Driver id</th>
        <th>Driver first name</th>
        <th>Driver last name</th>

    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['driver_id']);?></td>
            <td><?php echo h($subjects['driver_firstname']);?></td>
            <td><?php echo h($subjects['driver_lastname']);?></td>

        </tr>
    <?php } ?>
    <form action = "ChooseFromExist.php" method = "post">
        <dl>
            <dt>choose a driver</dt>
            <dd><label>
                    <input type = "text" placeholder = "Driver id" name = "driver_id"/>
                </label></dd>
        </dl>

        <input type = "submit" value = "add" id = "btn" name = "submit">
    </form>
<?php
    function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

if(is_post_request()){
    $driver_id = $_POST['driver_id'] ??'';

    $sql2 = "insert into vehicle_driver ";
    $sql2 .="values(";
    $sql2 .="'". $_SESSION['vehicle_id'] ."',";
    $sql2 .="'". $driver_id ."'";
    $sql2 .=")";
    $result2 = mysqli_query($db,$sql2);

    if($result){
        //header("Location: Driver.php?id=". $_SESSION['vehicle_id']);
        header("Location: ViewInsurance.php");
    }else{
        #echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }
}
    ?>



    <?php mysqli_free_result($result)?>
</table>

