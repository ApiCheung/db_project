<?php require_once('dbConnection.php');?>
<html>
<head>
    <title>Register</title>
</head>
<body>
        <div class="signup">
            <h3>Register</h3>
            <form action = "register.php" method = "post">
                <dl>
                    <dt>id</dt>
                    <dd><label>
                            <input type = "text" placeholder = "customer ID" name = "customer_id"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>first name</dt>
                    <dd><label>
                            <input type = "text" placeholder = "firstname" name = "customer_firstname"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>last name</dt>
                    <dd><label>
                            <input type = "text" placeholder = "lastname" name = "customer_lastname"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>street</dt>
                    <dd><label>
                            <input type = "text" placeholder = "street" name = "customer_street"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>city</dt>
                    <dd><label>
                            <input type = "text" placeholder = "city" name = "customer_city"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>state</dt>
                    <dd><label>
                            <input type = "text" placeholder = "state" name = "customer_state"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>zip</dt>
                    <dd><label>
                            <input type = "text" placeholder = "zip" name = "customer_zip"/>
                        </label></dd>
                </dl>
                <dl>
                    <dt>gender</dt>
                    <dd><label for gender>
                            <select name = "customer_gender">
                                <option value = "F">female</option>
                                <option value = "M">male</option>
                            </select>
                        </label></dd>
                </dl>
                <dl>
                    <dt>martial</dt>
                    <dd><label for martial>
                            <select name = "martial">
                                <option value = "M">married</option>
                                <option value = "S">single</option>
                                <option value = "W">widow/widower</option>
                            </select>
                        </label></dd>
                </dl>
                <dl>
                    <dt>type</dt>
                    <dd><label for type>
                            <select name = "customer_type">
                                <option value = "H">house</option>
                                <option value = "A">auto machine</option>
                                <option value = "B">both</option>
                            </select>
                        </label></dd>
                </dl>
                <dl>
                    <dt>password</dt>
                    <dd><label>
                            <input type = "password" placeholder = "password" name = "password"/>
                        </label></dd>
                </dl>


                <input type = "submit" value = "register" id = "btn" name = "submit">
            </form>
        </div>
</body>
</html>