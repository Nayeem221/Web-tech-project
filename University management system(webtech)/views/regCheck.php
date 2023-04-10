
<?php
$title= "Registration";
include('../views/header.html');
?>
<script type="text/javascript" src="../js/registrationScript.js"></script>
</head>
<body>

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

<table border="1px" align="center" width="100%">
    <tr>
        <td height="400px">
            <table align="center">
                <tr>
                    <td>
                         <?php  ?> 

                        <fieldset>
                            <legend>REGISTRATION</legend>
                            <table>
                                <tr>
                                    <td colspan="2" align="center">
                                        <h2 align="center">Sign Up</h2>
                                        <img src="../asset/login.jpg">
                                        <hr>

                                        <h2 align="center" id="txtHint"></h2>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>
                                        <input type="text" name="username" id="username" value="">
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>Full Name</td>
                                    <td>
                                        <input type="text" name="full_name" id="full_name " value="">
                                    </td>
                                </tr>
                               

                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <input type="password" name="password" id="password" value="">
                                    </td>
                                </tr>
                                

                                <tr>
                                    <td>Confirm Password</td>
                                    <td>
                                        <input type="password" name="confpass" id="confpass" value="">
                                    </td>
                                </tr>
                               

                                <tr>
                                    <td>Mobile Number</td>
                                    <td>
                                        <input type="text" name="phone" value="" id="phone">
                                    </td>
                                </tr>
                               

                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="email" name="email" id="email" value="">
                                    </td>
                                </tr>
                                

                                <tr>
                                    <td>Program</td>
                                    <td>
                                        <select name="program" id="program">
                                            <option value="">-Select-</option>
                                            <option value="Bsc in CSE">Bsc in CSE</option>
                                            <option value="Bsc in EEE">Bsc in EEE</option>
                                            <option value="Bsc in ENG">Bsc in ENG</option>
                                            <option value="BBA">BBA</option>
                                        </select>
                                    </td>
</tr>

                                <tr>
                                    <td>Date of Birth</td>
                                    <td>
                                        <input type="date" name="dob" id="dob" value="">
                                    </td>
                                </tr>
                               

                                <tr align="center">
                                    <td colspan="2">
                                        <hr><br>
                                        <input type="submit" class="regbtn" id="submit"  value="Sign Up" onclick="regCheckValidation()"><br><br>
                                        <span>Already SignUp ?</span>&nbsp;&nbsp;<a href="login_check.php">Login</a>
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