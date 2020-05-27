
<?php
session_start();
$id = $_SESSION['customer_id'];
echo "you are login with customer id " .$id. "</br>";

session_start();
$_SESSION['insurance_id'] = null;
$_SESSION['insurance_amount'] = null;

require_once('dbConnection.php');

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
if(is_post_request()){
    $insurance_id = $_POST['insurance_id'];
    $_SESSION['insurance_id'] = $insurance_id;
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $insurance_amount = $_POST['insurance_amount'];
    $_SESSION['insurance_amount'] = $insurance_amount;

    $sql = "insert into INSURANCE ";
    $sql .="values(";
    $sql .="'". $insurance_id ."',";
    $sql .="'". $start_date ."',";
    $sql .="'". $end_date ."',";
    $sql .="'". $insurance_amount ."',";
    $sql .="'". "C" ."',";
    $sql .="'". "A" ."',";
    $sql .="'". $id ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    if($result){

        header("Location: Vehicle.php");

    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }

}else{
    echo '?';
}
?>
