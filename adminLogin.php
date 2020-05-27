<?php
/**
 *db_project
 *adminLogin.php
 *Description
 *Created on 5/3/20 5:27 下午
 *Author: Esmee Zhang
 */
?>

<?php
require_once('dbConnection.php');
function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

$admin_id = $_POST['admin_id'];
$password = $_POST['password'];
$sql = "select * from admin where admin_id = '$admin_id' and password = '$password'";
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);
if($row){

    $_SESSION['admin_id'] = $admin_id;
    header('Location:AdminHome.php');
}else{
    echo '<html><head><Script Language="JavaScript">alert("admin and pswd not match");</Script></head></html>' . "<meta http-equiv=\"refresh\" content=\"0;url=adminLoginHtml.php\">";


    ?>


    <?php

}

$result = mysqli_query($db,$sql);

if($result){
    echo 'db query success';
    exit;
}
else{
    echo 'db query fail';
    exit;
}

?>
