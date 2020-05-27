<?php
/**
 *db_project
 *register.php
 *Description
 *Created on 5/2/20 1:53 下午
 *Author: Esmee Zhang
 */
?>
<?php
require_once('dbConnection.php');
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
if(is_post_request()){
    if(strlen($_POST['customer_id']) != 8)
    {

        echo '<html><head><Script Language="JavaScript">alert("id must be 8 numbers");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=signup.php\">";
    }else if(empty($_POST["password"])){
        echo '<html><head><Script Language="JavaScript">alert("password can not be empty");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=signup.php\">";
    }else{
    $customer_id = $_POST['customer_id'] ??'';
    $customer_firstname = $_POST['customer_firstname'] ?? '';
    $customer_lastname = $_POST['customer_lastname'] ?? '';
    $customer_street = $_POST['customer_street'] ?? '';
    $customer_city = $_POST['customer_city'] ?? '';
    $customer_state = $_POST['customer_state'] ?? '';
    $customer_zip = $_POST['customer_zip'] ?? '';
    $customer_gender = $_POST['customer_gender'] ?? '';
    $martial = $_POST['martial'] ?? '';
    $customer_type = $_POST['customer_type'] ?? '';
    $password = $_POST['password'] ?? '';
    $hashpswd = password_hash($password, PASSWORD_DEFAULT);

    $sql_select = "select customer_id from customer where customer_id='" . $customer_id . "'";
    $r = mysqli_query($db, $sql_select);
    $row = mysqli_fetch_assoc($r);

    if($customer_id == $row['customer_id']){
        echo '<html><head><Script Language="JavaScript">alert("user exit");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=signup.php\">";
    }else{
    $sql = "insert into CUSTOMER ";
    $sql .="values(";
    $sql .="'". $customer_id ."',";
    $sql .="'". $customer_firstname ."',";
    $sql .="'". $customer_lastname ."',";
    $sql .="'". $customer_street ."',";
    $sql .="'". $customer_city ."',";
    $sql .="'". $customer_state ."',";
    $sql .="'". $customer_zip ."',";
    $sql .="'". $customer_gender ."',";
    $sql .="'". $martial ."',";
    $sql .="'". $customer_type ."',";
    $sql .="'". $hashpswd ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    if($result){
        header("Location: login.php");

    }else{
        #echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }}
    }

}else{
    echo '?';
}
?>
