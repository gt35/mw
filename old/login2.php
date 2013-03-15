<?php


    if($_POST)
    {
	$username = $_POST['U'];
        $upass = $_POST['P'];
    }
    $dbhost = 'sql.njit.edu';
	$dbuser = 'thh4';
	$dbpass = 'yapping45';
	$dbname = 'thh4';
        
         mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error()); 

         mysql_select_db("$dbname") or die(mysql_error()); 
$username=stripslashes($_POST['ucid']); 
$password=stripslashes($_POST['pass']); 
$sql = "SELECT * FROM USER WHERE UCID='$username' and PASSWORD='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
echo "Login Sucessful";
//header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
        
        
	//$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die ('Error connecting to mysql');

       // $check = mysql_query("SELECT * FROM USER WHERE UCID = '$username'") or die(mysql_error());


?>