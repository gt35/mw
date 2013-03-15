<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Connects to your Database 
        mysql_connect("sql.njit.edu", "thh4", "yapping45") or die(mysql_error());
        mysql_select_db("thh4") or die(mysql_error());

//Checks if there is a login cookie 

        if (isset($_COOKIE['tnmu'])) {

//if there is, it logs you in and directes you to the members page 
            $username = $_COOKIE['tnmu'];
            $pass = $_COOKIE['tnmp'];
            $check = mysql_query("SELECT * FROM user WHERE ucid = '$username'") or die(mysql_error());
            while ($info = mysql_fetch_array($check)) {
                if ($pass != $info['password']) {
                    
                } else {
                    header("Location: members.php");
                }
            }
        }

//if the login form is submitted 

        if (isset($_POST['student'])) {

// if form has been submitted
// makes sure they filled it in
            if (!$_POST['ucid'] | !$_POST['pass']) {
                die('You did not fill in a required field.');
            }
            // checks it against the database

            $check = mysql_query("SELECT * FROM users WHERE ucid = '" . $_POST['ucid'] . "'") or die(mysql_error());

            //Gives error if user dosen't exist
            $check2 = mysql_num_rows($check);
            if ($check2 == 0) {
                die(//'That user does not exist in our database. <a href=add.php>Click Here to Register</a>'
				);
            }
            while ($info = mysql_fetch_array($check)) {
                $_POST['pass'] = stripslashes($_POST['pass']);
                $info['pass'] = stripslashes($info['pass']);
                $_POST['pass'] = md5($_POST['pass']);

                //gives error if the password is wrong
                if ($_POST['pass'] != $info['pass']) {
                    die('Incorrect password, please try again.');
                } else { // if login is ok then we add a cookie 	 
                    $_POST['ucid'] = stripslashes($_POST['ucid']);
                    $hour = time() + 3600;
                    setcookie(tnmu, $_POST['ucid'], $hour);
                    setcookie(tnmp, $_POST['pass'], $hour);
                    //then redirect them to the members area 
                    header("Location: members.php");
                }
            }
        } else {  // if they are not logged in 
            ?> 
            <!--<form action="<?//php echo $_SERVER['PHP_SELF'] ?>" method="post"> <table border="0"> <tr><td colspan=2><h1>Login</h1></td></tr> <tr><td>Username:</td><td> <input type="text" name="username" maxlength="40"> </td></tr> <tr><td>Password:</td><td> <input type="password" name="pass" maxlength="50"> </td></tr> <tr><td colspan="2" align="right"> <input type="submit" name="submit" value="Login"> </td></tr> </table> </form> <?//php } ?>--> 
    </body>
</html>
