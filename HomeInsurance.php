<?php
session_start();
 $id = $_SESSION['customer_id'];
 echo "you are login with customer id " .$id. "</br>";

require_once('dbConnection.php');
?>

<html>
<head>
    <title>Buy HomeInsurance</title>
</head>
<body>
        <div class="signup">
            <h3>Buy HomeInsurance</h3>
            <link rel="stylesheet" media = "all" href="staff.css"/>
            <form action = "buyhomeinsurance.php" method = "post">
                <dl>
                    <dt>insurance ID</dt>
                    <dd><label>
                            <input type = "text" placeholder = "insurance ID" name = "insurance_id"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>start date</dt>
                    <dd><label>
                            <input type = "text" placeholder = "start date" name = "start_date"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>end date</dt>
                    <dd><label>
                            <input type = "text" placeholder = "end date" name = "end_date"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>insurance amount</dt>
                    <dd><label>
                            <input type = "text" placeholder = "insurance amount" name = "insurance_amount"/>
                        </label></dd>
                </dl>
				

                <input type = "submit" value = "buy" id = "btn" name = "submit">
            </form>
        </div>
</body>
</html>