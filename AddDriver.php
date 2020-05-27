<?php
/**
 *db_project
 *${FILE_NAME}
 *Description
 *Created on 5/5/20 3:41 下午
 *Author: Esmee Zhang
 */
?>
<?php

?>

<?php
session_start();
$vid = $_SESSION['vehicle_id'];
#echo $id;
if(!isset($_SESSION['vehicle_id'])){
    echo "error";
}
echo "your vehicle id " .$_SESSION['vehicle_id']. "</br>";?>

<html>
<link rel="stylesheet" media = "all" href="staff.css"/>
<head>
    <title>Add Driver</title>
</head>
<body>
<div class="addDriver">
    <h3>Add Driver</h3>
    <form action = "AddDriver.php" method = "post">
        <dl>
            <dt>id</dt>
            <dd><label>
                    <input type = "text" placeholder = "Driver id" name = "driver_id"/>
                </label></dd>
        </dl>
        <dl>
            <dt>driver license</dt>
            <dd><label>
                    <input type = "text" placeholder = "Driver license" name = "driver_license"/>
                </label></dd>
        </dl>
        <dl>
            <dt>first name</dt>
            <dd><label>
                    <input type = "text" placeholder = "First name" name = "driver_firstname"/>
                </label></dd>
        </dl>
        <dl>
            <dt>last name</dt>
            <dd><label>
                    <input type = "text" placeholder = "Last name" name = "driver_lastname"/>
                </label></dd>
        </dl>
        <dl>
            <dt>birthdate</dt>
            <dd><label>
                    <input type = "text" placeholder = "birthdate" name = "driver_birthdate"/>
                </label></dd>
        </dl>



        <input type = "submit" value = "add" id = "btn" name = "submit">
    </form>

    <script>
        function choose() {
            window.open('ChooseFromExist.php');
        }
    </script>


    <button onclick="choose()">choose from exist</button>

</div>
</body>
</html>
<?php
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
require_once('dbConnection.php');
if(is_post_request()){
    $driver_id = $_POST['driver_id'] ??'';
    $driver_license = $_POST['driver_license'] ?? '';
    $driver_firstname = $_POST['driver_firstname'] ?? '';
    $driver_lastname = $_POST['driver_lastname'] ?? '';
    $driver_birthdate = $_POST['driver_birthdate'] ?? '';


    $sql = "insert into driver ";
    $sql .="values(";
    $sql .="'". $driver_id ."',";
    $sql .="'". $driver_license ."',";
    $sql .="'". $driver_firstname ."',";
    $sql .="'". $driver_lastname ."',";
    $sql .="'". $driver_birthdate ."'";
    $sql .=")";
    $result = mysqli_query($db, $sql);

    $sql2 = "insert into vehicle_driver ";
    $sql2 .="values(";
    $sql2 .="'". $_SESSION['vehicle_id'] ."',";
    $sql2 .="'". $driver_id ."'";
    $sql2 .=")";
    $result2 = mysqli_query($db,$sql2);

    if($result){
        //header("Location: Driver.php?id=". $_SESSION['vehicle_id']);
        header("Location: ViewInsurance.php");
    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }


}else{
    //echo '?';
}
?>

