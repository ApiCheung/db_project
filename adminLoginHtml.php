<?php
/**
 *db_project
 *adminLoginHtml.php
 *Description
 *Created on 5/3/20 10:29 下午
 *Author: Esmee Zhang
 */
?>

<html>
<link rel="stylesheet" media = "all" href="staff.css"/>
<head>
    <title>Login</title>
</head>
<body>
<div class="window">
    <div class="content">
        <div class = "register">
            <h3>Login</h3>
            <form action = "adminLogin.php" method = "post">

                <dl>

                    <dt>ID</dt>
                    <dd><label>
                            <input type = "text" placeholder = "Admin ID" name = "admin_id"/>
                        </label></dd>
                </dl>


                <dl>
                    <dt>password</dt>
                    <dd><label>
                            <input type = "password" placeholder = "password" name = "password"/>
                        </label></dd>
                </dl>




                <input type = "submit" value = "login" id = "btn" name = "submit">
            </form>
        </div>

    </div>
</div>
</body>
</html>
