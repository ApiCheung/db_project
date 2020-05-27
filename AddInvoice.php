
<?php
session_start();
 $id = $_SESSION['customer_id'];
 $insurance = $_SESSION['insurance_id'];
 $amount = $_SESSION['insurance_amount'];
 echo "you are login with customer id " .$id. "</br>";

 $_SESSION['invoice_id'] = null;


require_once('dbConnection.php');

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
if(is_post_request()){
	$invoice_id = $_POST['invoice_id'];
	#$_SESSION['invoice_id'] = $invoice_id;
	$invoice_due_date = $_POST['invoice_due_date'];
	
	$sql = "insert into INVOICE ";
    $sql .="values(";
    $sql .="'". $invoice_id ."',";
    $sql .="'". $amount ."',";
    $sql .="'". $invoice_due_date ."', 0, ";
    $sql .="'". $insurance ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    if($result){
	echo "?";
        header("Location: ViewInsurance.php");

		}else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }

}else{
    echo '?';
}
?>
