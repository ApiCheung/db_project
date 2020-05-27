<?php
/**
 *db_project
 *adminSearch.php
 *Description
 *Created on 5/4/20 8:47 下午
 *Author: Esmee Zhang
 */
?>
<?php require_once('dbConnection.php');

function is_post_request()
{
return $_SERVER['REQUEST_METHOD'] == 'POST';
}
?>
<?php
function h($string=""){
    return htmlspecialchars($string);
}
function u($string="") {
    return urlencode($string);
}
?>
<html>
<head>Type</head>

<?php echo $_POST['customer_type'];?>
<?php
if ($_POST['customer_type'] == 'H'){
$sql = "SELECT a.home_id, a.pur_date, a.pur_value, a.home_area, a.home_type, a.fire_not, a.home_security, a.swimming_pool, a.basement, a.insurance_id ";
$sql .="FROM home a join insurance b on a.insurance_id = b.insurance_id ";
$result = mysqli_query($db, $sql);
?>


<table class="list">
    <link rel="stylesheet" media = "all" href="staff.css"/>
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
        <th>Insurance ID</th>
        <th>Invoice</th>
        <th>Payment</th>
    </tr>

    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['home_id']);?></td>
            <td><?php echo h($subjects['pur_date']);?></td>
            <td><?php echo h($subjects['pur_value']);?></td>
            <td><?php echo h($subjects['home_area']);?></td>
            <td><?php echo h($subjects['home_type']);?></td>
            <td><?php echo h($subjects['fire_not']);?></td>
            <td><?php echo h($subjects['home_security']);?></td>
            <td><?php echo h($subjects['swimming_pool']);?></td>
            <td><?php echo h($subjects['basement']);?></td>
            <td><?php echo h($subjects['insurance_id']);?></td>
            <td><a class="action" href="<?php echo 'ViewInv.php?id=' .h(u($subjects['insurance_id']));?>">View</a></td>
            <td><a class="action" href="<?php echo 'ViewPay.php?id=' . h(u($subjects['insurance_id']));?>">View</a></td>
        </tr>


    <?php }?>
</table>
<?php }else{?>
<?php
$sql = "select a. vehicle_id, a.vin, a. vehicle_year, a.vehicle_status, a.insurance_id ";
$sql .="from vehicle a join insurance b on a.insurance_id = b.insurance_id ";
$result = mysqli_query($db, $sql);?>

<table class="list">
    <link rel="stylesheet" media = "all" href="staff.css"/>
    <tr>
        <th>Vehicle id</th>
        <th>Vin</th>
        <th>Vehicle year</th>
        <th>Vehicle status</th>
        <th>Insurance ID</th>
        <th>Invoice</th>
        <th>Payment</th>

    </tr>

    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['vehicle_id']);?></td>
            <td><?php echo h($subjects['vin']);?></td>
            <td><?php echo h($subjects['vehicle_year']);?></td>
            <td><?php echo h($subjects['vehicle_status']);?></td>
            <td><?php echo h($subjects['insurance_id']);?></td>
            <td><a class="action" href="<?php echo 'ViewInv.php?id=' .h(u($subjects['insurance_id']));?>">View</a></td>
            <td><a class="action" href="<?php echo 'ViewPay.php?id=' . h(u($subjects['insurance_id']));?>">View</a></td>
        </tr>

    <?php }} ?>
</table>



