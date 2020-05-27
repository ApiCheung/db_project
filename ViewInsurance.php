<?php
/**
 *db_project
 *ViewInsurance.php
 *Description
 *Created on 5/2/20 10:04 下午
 *Author: Esmee Zhang
 */
?>
<?php
session_start();
 $id = $_SESSION['customer_id'];
 echo "you are login with customer id " .$id. "</br>";
echo '<a href="loginto.php?action=logout">LOGOUT</a><br />';
require_once('dbConnection.php');

$sql = "SELECT * FROM INSURANCE ";
$sql .="WHERE customer_id = '" . mysqli_real_escape_string($db,$id) ."'";
$result = mysqli_query($db, $sql);

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


<h1>View my insurance</h1>

<table class="list">
    <tr>
        <th>Insurance id</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Insurance amount</th>
        <th>Insurance status</th>
        <th>Insurance type</th>
        <th>View invoice</th>

    </tr>
    <?php while($subjects = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo h($subjects['insurance_id']);?></td>
            <td><?php echo h($subjects['start_date']);?></td>
            <td><?php echo h($subjects['end_date']);?></td>
            <td><?php echo h($subjects['insurance_amount']);?></td>
            <td><?php echo h($subjects['insurance_status']);?></td>
            <td><?php echo h($subjects['insurance_type']);?></td>
            <td><a class="action" href="<?php echo 'CusViewInv.php?id=' .h(u($subjects['insurance_id']));?>">View</a></td>

        </tr>
    <?php } ?>


    <?php mysqli_free_result($result)?>
</table>


<H1>Search as insurance type</H1>
<h3>Select a type H(home)/A(auto)</h3>

<form action = "search.php" method = "post">
    <label for type>
        <select name = "customer_type">
            <option value = "H">house</option>
            <option value = "A">auto machine</option>
        </select>
    </label>
    <input type = "submit" value = "search" id = "src" name = "search">
</form>



<H1>Buy Insurance</H1>
<h3>Home</h3>
<ul>
    <li><a href="HomeInsurance.php">Buy</a></li>
</ul>
<h3>Vehicle</h3>
<ul>
    <li><a href ="VehicleInsurance.php">Buy</a></li>
</ul>

</html>
