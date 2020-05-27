<?php
session_start();
$id = $_SESSION['customer_id'];
$insurance = $_SESSION['insurance_id'];
$amount = $_SESSION['insurance_amount'];
echo "you are login with customer id " .$id. "</br>";

require_once('dbConnection.php');
?>

<html>
<head>
    <title>Buy HomeInsurance</title>
</head>
<body>
<div class="signup">
    <h3>Vehicle Type</h3>
    <form action = "buyauto.php" method = "post">
        <dl>
        <dt>vehicle id</dt>
        <dd><label>
                <input type = "text" placeholder = "vehicle id" name = "vehicle_id"/>
            </label></dd>
        </dl>
        <dl>
            <dt>VIN</dt>
            <dd><label>
                    <input type = "text" placeholder = "VIN" name = "vin"/>
                </label></dd>
        </dl>
        <dl>
            <dt>vehicle year</dt>
            <dd><label>
                    <input type = "text" placeholder = "vehicle year" name = "vehicle_year"/>
                </label></dd>
        </dl>
        <dl>
            <dt>vehicle status</dt>
            <dd><label for vehicle status>
                    <select name = "vehicle_status">
                        <option value = "L">Leased</option>
                        <option value = "F">Financed</option>
                        <option value = "O">Owned</option>
                    </select>
                </label></dd>
        </dl>




        <input type = "submit" value = "buy" id = "btn" name = "submit">
    </form>
</div>
</body>
</html>