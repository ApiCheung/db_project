<?php
/**
 *db_project
 *MakePay.php
 *Description
 *Created on 5/6/20 5:42 PM
 *Author: Esmee Zhang
 */
?>
<?php
session_start();
require_once('dbConnection.php');

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
if(!isset($_GET['vid'])){
    echo "get error";
}

$vid = $_GET['vid'];
$_SESSION['invoice_id'] = $vid;
#echo $_SESSION['invoice_id'];
echo "your invoice ID is ". $vid;
function h($string="") {
    return htmlspecialchars($string);
}

function u($string="") {
    return urlencode($string);
}
?>




<form action = "<?php echo 'MakePayP.php?vid=' .h(u($vid));?>" method = "post">

    <dl>
        <dt> Payment id</dt>
        <dd><label>
                <input type="text" name="payment_id" />
            </label></dd>
    </dl>
    <dl>
        <dt>Payment Method</dt>
        <dd><label for Payment Method>
                <select name = "method">
                    <option value = "PP">Paypal</option>
                    <option value = "CD">Credit</option>
                    <option value = "DB">Debit</option>
                    <option value = "CK">Check</option>
                </select>
            </label></dd>
    </dl>


    <input type = "submit" value = "Pay" id = "btn" name = "submit">
</form>