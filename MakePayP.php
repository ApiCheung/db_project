<?php
/**
 *db_project
 *MakePayP.php
 *Description
 *Created on 5/6/20 6:11 PM
 *Author: Esmee Zhang
 */
?>

<?php
session_start();
require_once('dbConnection.php');
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}


$vid = $_SESSION['invoice_id'];


if(is_post_request()){
    $time = date("Ymd");
    $sql = "insert into payment ";
    $sql .="values(";
    $sql .="'". $_POST['payment_id'] ."',". $time;
    $sql .=",'". $_POST['method']."', ";
    $sql .="'". $vid ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    $sql2 = "update invoice set paid = 1 where invoice_id ='" . mysqli_real_escape_string($db,$vid)  ."'";
    $result2 = mysqli_query($db, $sql2);

    if($result && $result2){
        header("Location: ViewInsurance.php");

    }else{
        date("Ymd");
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }

}else{
    echo '?';
}
?>