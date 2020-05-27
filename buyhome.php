
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
    $home_id = $_POST['home_id'];
    $pur_date = $_POST['pur_date'];
    $pur_value = $_POST['pur_value'];
    $home_area = $_POST['home_area'];
    $home_type = $_POST['home_type'];
    $fire_not = $_POST['fire_not'];
    $home_security = $_POST['home_security'];
    $swimming_pool = $_POST['swimming_pool'];
    $basement = $_POST['basement'];

    $sql = "insert into HOME ";
    $sql .="values(";
    $sql .="'". $home_id ."',";
    $sql .="'". $pur_date ."',";
    $sql .="'". $pur_value ."',";
    $sql .="'". $home_area ."',";
    $sql .="'". $home_type ."',";
    $sql .="'". $fire_not ."',";
    $sql .="'". $home_security ."',";
    $sql .="'". $swimming_pool ."',";
    $sql .="'". $basement ."',";
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
