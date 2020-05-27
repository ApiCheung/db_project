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
    <h3>Home Type</h3>
    <form action = "buyhome.php" method = "post">
        <link rel="stylesheet" media = "all" href="staff.css"/>
        <dl>
            <dt>home id </dt>
            <dd><label>
                    <input type = "text" placeholder = "home id" name = "home_id"/>
                </label></dd>
        </dl>
        <dl>
            <dt>purchase date</dt>
            <dd><label>
                    <input type = "text" placeholder = "purchase date" name = "pur_date"/>
                </label></dd>
        </dl>
        <dl>
            <dt>purchase value</dt>
            <dd><label>
                    <input type = "text" placeholder = "purchase value" name = "pur_value"/>
                </label></dd>
        </dl>
        <dl>
            <dt>home area</dt>
            <dd><label>
                    <input type = "text" placeholder = "home area" name = "home_area"/>
                </label></dd>
        </dl>
        <dl>
            <dt>home type</dt>
            <dd><label for home type>
                    <select name = "home_type">
                        <option value = "S">Single family</option>
                        <option value = "M">Multi family</option>
                        <option value = "C">Condominium</option>
                        <option value = "T">Town house</option>
                    </select>
                </label></dd>
        </dl>
        <dl>
            <dt>auto fire notification</dt>
            <dd><label for auto fire notification>
                    <select name = "fire_not">
                        <option value = "0">No</option>
                        <option value = "1">Yes</option>
                    </select>
                </label></dd>
        </dl>
        <dl>
            <dt>home security system</dt>
            <dd><label for home security system>
                    <select name = "home_security">
                        <option value = "0">No</option>
                        <option value = "1">Yes</option>
                    </select>
                </label></dd>
        </dl>
        <dl>
            <dt>swimming pool</dt>
            <dd><label for swimming pool>
                    <select name = "swimming pool">
                        <option value = "U">Underground</option>
                        <option value = "O">Overground</option>
                        <option value = "I">Indoor</option>
                        <option value = "M">Multiple</option>
                    </select>
                </label></dd>
        </dl>
        <dl>
            <dt>basement</dt>
            <dd><label for basement>
                    <select name = "basement">
                        <option value = "0">No</option>
                        <option value = "1">Yes</option>
                    </select>
                </label></dd>
        </dl>



        <input type = "submit" value = "buy" id = "btn" name = "submit">
    </form>
</div>
</body>
</html>