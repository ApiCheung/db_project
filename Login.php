<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="window">
    <div class="content">
        <div class = "register">
            <h3>Login</h3>
            <form action = "loginto.php" method = "post">

                <dl>
                    <dt>ID</dt>
                    <dd><label>
                            <input type = "text" placeholder = "customer ID" name = "customer_id"/>
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