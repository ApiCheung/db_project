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
$sql = "select a.insurance_id, b.payment_id, b.payment_date, b.method from invoice a join payment b on a.invoice_id=b.invoice_id ";
$sql .= "where insurance_id='". mysqli_real_escape_string($db,$id). "'";
$result = mysqli_query($db, $sql);
?>
<html>
<link rel="stylesheet" media = "all" href="staff.css"/>
<h1>View Payment</h1>
<table class="list">
    <tr>
        <th>Payment id</th>
        <th>payment date</th>
        <th>Method</th>
    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['payment_id']);?></td>
            <td><?php echo h($subjects['payment_date']);?></td>
            <td><?php echo h($subjects['method']);?></td>
        </tr>
    <?php } ?>


    <?php mysqli_free_result($result)?>
</table>

