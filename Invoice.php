<?php
session_start();
 $id = $_SESSION['customer_id'];
 $insurance = $_SESSION['insurance_id'];
 $amount = $_SESSION['insurance_amount'];
 echo "you are login with customer id " .$id. "</br>";

require_once('dbConnection.php');
?>

<html>
<link rel="stylesheet" media = "all" href="staff.css"/>
<head>
    <title>Add Invoice</title>
</head>
<body>
        <div class="signup">
            <h3>Add Invoice</h3>
            <form action = "AddInvoice.php" method = "post">
                <dl>
                    <dt>invoice id</dt>
                    <dd><label>
                            <input type = "text" placeholder = "invoice id" name = "invoice_id"/>
                        </label></dd>
                </dl>
				<dl>
                    <dt>due date</dt>
                    <dd><label>
                            <input type = "text" placeholder = "due date" name = "invoice_due_date"/>
                        </label></dd>
                </dl>
        

                <input type = "submit" value = "Add" id = "btn" name = "submit">
            </form>
        </div>
</body>
</html>