
<?php
session_start();
$id = $_SESSION['customer_id'];
$insurance = $_SESSION['insurance_id'];
$amount = $_SESSION['insurance_amount'];
echo "you are login with customer id " .$id. "</br>";

require_once('dbConnection.php');

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
if(is_post_request()){
    $vehicle_id = $_POST['vehicle_id'];
    $vin = $_POST['vin'];
    $vehicle_year = $_POST['vehicle_year'];
    $vehicle_status = $_POST['vehicle_status'];

    $sql = "insert into VEHICLE ";
    $sql .="values(";
    $sql .="'". $vehicle_id ."',";
    $sql .="'". $vin ."',";
    $sql .="'". $vehicle_year ."',";
    $sql .="'". $vehicle_status ."',";
    $sql .="'". $insurance ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    if($result){

        header("Location: Invoice.php");

    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }

}else{
    echo '?';
}
?>
