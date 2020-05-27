<?php
/**
 *db_project
 *dbConnection.php
 *Description
 *Created on 5/2/20 2:44 下午
 *Author: Esmee Zhang
 */
?>
<?php

function db_connect(){
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = 'Zxr13579!!';
    $dbName = 'we_do_secure';
    $connection = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
    return $connection;
}
function db_disconnect($connection){
    mysqli_close($connection);
}
$db = db_connect();

?>
