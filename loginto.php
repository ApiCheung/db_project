<?php
/**
 *db_project
 *loginto.php
 *Description
 *Created on 5/2/20 4:31 下午
 *Author: Esmee Zhang
 */
?>
<?php session_start();
$_SESSION['customer_id'] = null;
?>

<?php
require_once('dbConnection.php');
function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
if($_GET['action'] == "logout") {
    session_destroy();
    echo 'LOGOUT <a href="Login.php">LOGIN</a>';
    exit;
}

$customer_id = $_POST['customer_id'];
$password = $_POST['password'];
$sql = "select * from customer where customer_id = '$customer_id'";
#$sql = "select customer_id, password from customer where customer_id = '$customer_id' ";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);

if($row){
    while($rows = mysqli_fetch_assoc($result)){
        $dbpaswd = $rows['password'];
    }
    if(password_verify($password, $dbpaswd)){
        $_SESSION['customer_id'] = $customer_id;
        header('Location:ViewInsurance.php');

    }else{
        echo '<html><head><Script Language="JavaScript">alert("user and pswd not match!!!!!!");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=login.php\">";

    }
//if($row['password'] == $password){
//    echo "login success";

}else{

    echo '<html><head><Script Language="JavaScript">alert("user and pswd not match");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=login.php\">";

    ?>


    <?php
    #header('Location: login.php');
}

$result = mysqli_query($db,$sql);



?>
