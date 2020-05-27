<?php
/**
 *db_project
 *AdminHome.php
 *Description
 *Created on 5/3/20 10:33 下午
 *Author: Esmee Zhang
 */
?>
<?php


require_once('dbConnection.php');

$sql = "SELECT * FROM INSURANCE ";
$result = mysqli_query($db, $sql);

$sql2 = "SELECT * FROM CUSTOMER ";
$result2 = mysqli_query($db, $sql2);
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
<link rel="stylesheet" media = "all" href="staff.css"/>
<h1>View insurance</h1>
<table class="list">
    <tr>
        <th>Insurance id</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Insurance amount</th>
        <th>Insurance status</th>
        <th>Insurance type</th>
        <th>Customer ID</th>
        <th></th>
        <th></th>
    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['insurance_id']);?></td>
            <td><?php echo h($subjects['start_date']);?></td>
            <td><?php echo h($subjects['end_date']);?></td>
            <td><?php echo h($subjects['insurance_amount']);?></td>
            <td><?php echo h($subjects['insurance_status']);?></td>
            <td><?php echo h($subjects['insurance_type']);?></td>
            <td><?php echo h($subjects['customer_id']);?></td>
            <td><a class="action" href="<?php echo 'edit.php?id=' .h(u($subjects['insurance_id']));?>">Edit</a></td>
            <td><a class="action" href="<?php echo 'delete.php?id=' . h(u($subjects['insurance_id']));?>">Delete</a></td>
        </tr>
    <?php } ?>


    <?php mysqli_free_result($result)?>
</table>

<h1>View customer information</h1>
<table class="list">
    <tr>
        <th>Customer id</th>
        <th>Customer firstname</th>
        <th>Customer lastname</th>
        <th>Customer street</th>
        <th>Customer city</th>
        <th>Customer state</th>
        <th>Customer zip</th>
        <th>Customer gender</th>
        <th>Marital</th>
        <th>Customer type</th>
        <th></th>
        <th></th>
    </tr>
    <?php while($subjects2 = mysqli_fetch_assoc($result2)){ ?>
        <tr>
            <td><?php echo h($subjects2['customer_id']);?></td>
            <td><?php echo h($subjects2['customer_firstname']);?></td>
            <td><?php echo h($subjects2['customer_lastname']);?></td>
            <td><?php echo h($subjects2['customer_street']);?></td>
            <td><?php echo h($subjects2['customer_city']);?></td>
            <td><?php echo h($subjects2['customer_state']);?></td>
            <td><?php echo h($subjects2['customer_zip']);?></td>
            <td><?php echo h($subjects2['customer_gender']);?></td>
            <td><?php echo h($subjects2['martial']);?></td>
            <td><?php echo h($subjects2['customer_type']);?></td>
            <td><a class="action" href="<?php echo 'editCustomer.php?id=' .h(u($subjects2['customer_id']));?>">Edit</a></td>
            <td><a class="action" href="<?php echo 'DeleteCustomer.php?id=' . h(u($subjects2['customer_id']));?>">Delete</a></td>
        </tr>

    <?php }
    ?>



</table>


<H1>Search as insurance type</H1>
<h3>Select a type H(home)/A(auto)</h3>

<form action = "adminSearch.php" method = "post">
    <label for type>
        <select name = "customer_type">
            <option value = "H">house</option>
            <option value = "A">auto machine</option>
        </select>
    </label>
    <input type = "submit" value = "search" id = "src" name = "search">
</form>




</html>
