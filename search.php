<?php
/**
 *db_project
 *search.php
 *Description
 *Created on 5/3/20 3:42 下午
 *Author: Esmee Zhang
 */
?>
<?php
session_start();
$id = $_SESSION['customer_id'];
echo "you are login with customer id " .$id. "</br>";
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
?>
<html>
<head>Type</head>

<?php echo $_SESSION['CUSTOMER_TYPE'];?>
<?php
if ($_POST['customer_type'] == 'H'){
    $sql = "SELECT a.home_id, a.pur_date, a.pur_value, a.home_area, a.home_type, a.fire_not, a.home_security, a.swimming_pool, a.basement, b.customer_id ";
    $sql .="FROM home a join insurance b on a.insurance_id = b.insurance_id ";
    $sql .="WHERE b.customer_id = '". $id ."'";
    $result = mysqli_query($db, $sql);
   ?>


    <table class="list">
    <tr>
        <th>Home id </th>
        <th>Purchase date </th>
        <th>Purchase value </th>
        <th>Home area </th>
        <th>Home type </th>
        <th>Fire or nor </th>
        <th>Home security </th>
        <th>Swimming pool </th>
        <th>Basement </th>
        <th></th>
    </tr>

    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <link rel="stylesheet" media = "all" href="staff.css"/>
            <td><?php echo h($subjects['home_id']);?></td>
            <td><?php echo h($subjects['pur_date']);?></td>
            <td><?php echo h($subjects['pur_value']);?></td>
            <td><?php echo h($subjects['home_area']);?></td>
            <td><?php echo h($subjects['home_type']);?></td>
            <td><?php echo h($subjects['fire_not']);?></td>
            <td><?php echo h($subjects['home_security']);?></td>
            <td><?php echo h($subjects['swimming_pool']);?></td>
            <td><?php echo h($subjects['basement']);?></td>
        </tr>
        <?php $_SESSION['CUSTOMER_TYPE'] = $_POST['customer_type']?>

       <?php }?>
       </table>
<?PHP }else{?>
        <?php
        $sql = "select a. vehicle_id, a.vin, a. vehicle_year, a.vehicle_status,  b.customer_id ";
        $sql .="from vehicle a join insurance b on a.insurance_id = b.insurance_id ";
        $sql .="where b.customer_id = '". $id ."'";
        $result = mysqli_query($db, $sql);?>


        <table class="list">
            <link rel="stylesheet" media = "all" href="staff.css"/>
            <tr>
                <th>Vehicle id</th>
                <th>Vin</th>
                <th>Vehicle year</th>
                <th>Vehicle status</th>
                <th></th>

            </tr>

            <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo h($subjects['vehicle_id']);?></td>
                <td><?php echo h($subjects['vin']);?></td>
                <td><?php echo h($subjects['vehicle_year']);?></td>
                <td><?php echo h($subjects['vehicle_status']);?></td>
                <td><a class="action" href="<?php echo 'Driver.php?vid=' .h(u($subjects['vehicle_id']));?>">Driver</a></td>

            </tr>
                <?php $_SESSION['CUSTOMER_TYPE'] = $_POST['customer_type']?>

            <?php }


} ?>

        </table>

</html>
