
<?php
    $title= "Login Page";
    include('../views/header.html');
?>

        <script type="text/javascript" src="../js/loginCheckScript.js"></script>
    </head>

    <body>
        <div id="container">
            <table border="1px" align="center" width="100%">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="150px" height="80px">
                                    <img src="../asset/varsity.jpg" width="100%" height="100%">
                                </td>
                                <td align="right">
                                    <a href="home.html">Home</a> |
                                    <a href="login_check.php">Login</a> |
                                    <a href="regCheck.php">Registration</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table border="1px" align="center" width="100%"style="background-color: aqua;">
                <tr>
                    <td colspan="2" align="center" width="100%" height="425px" style="background-color: aqua;">
                        <table>
                            <tr>
                                <td>
                                    <fieldset>
                                        <legend>LOGIN</legend>
                                        <table>
                                            <tr>
                                                <td colspan="2" align="center" width="150px" height="50px">
                                                    <img src="../asset/login.jpg">
                                                    <hr>
                                                    <h2 id="txtHint"></h2>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="background-color: blueviolet;">User Id:</td>
                                                <td>
                                                    <input type="text" name="username" id="username" placeholder="@ username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];} ?>">
                                                </td>
                                            </tr>
                                            

                                            <tr>
                                                <td style="background-color: blueviolet;">Password:</td>
                                                <td>
                                                    <input type="password" name="password" id="password"placeholder="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
                                                </td>
                                            </tr>
                                            



                                            <tr>
                                                <td><input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE['loginUser'])){ echo "checked";} ?>> Remember Me</td>
                                            </tr>
                                            <tr align="center">
                                                <td colspan="2">
                                                    <hr><br>
                                                    <input type="submit" style="background-color:red;" name="submit" id="submit" value="Sign In" onclick="loginCheckValidation()"><br><br>

                                                    <a href="forgot_password.html">Forgot Password ?</a><br><br>
                                                    <a href="regCheck.php">Create an account ?</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

<?php
    include('../views/footer.html');
?>