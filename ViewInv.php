<?php
/**
 *db_project
 *ViewInv.php
 *Description
 *Created on 5/5/20 10:16 下午
 *Author: Esmee Zhang
 */
?>
<?php require_once('dbConnection.php');
function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
if(!isset($_GET['id'])){
    echo "get error";
}

$id = $_GET['id'];

echo $id;
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function h($string="") {
    return htmlspecialchars($string);
}
function u($string="") {
    return urlencode($string);
}
?>
<?php
$sql = "select * from invoice ";
$sql .= "where insurance_id='". $id. "'";
$result = mysqli_query($db, $sql);
?>
<html>
<link rel="stylesheet" media = "all" href="staff.css"/>
<h1>View Invoice</h1>
<table class="list">
    <tr>
        <th>Invoice id</th>
        <th>Invoice amount</th>
        <th>Due date</th>
        <th>Paid</th>
    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['invoice_id']);?></td>
            <td><?php echo h($subjects['invoice_amount']);?></td>
            <td><?php echo h($subjects['invoice_due_date']);?></td>
            <td><?php echo h($subjects['paid']);?></td>

        </tr>
    <?php } ?>


    <?php mysqli_free_result($result)?>
</table>

