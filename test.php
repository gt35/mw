<?php
      $isSubmitted = isset($_POST['isSubmitted']);
      //echo $isSubmitted;
      function open_conn()
      {
  	$dbhost = 'sql.njit.edu';
	$dbuser = 'thh4';
	$dbpass = 'yapping45';
	$dbname = 'thh4';
	$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname) or die ('Error connecting to mysql');
	return $conn;
      }
      if($isSubmitted && $isSubmitted == 1)
      {
	$username = $_POST['U'];
        $upass = $_POST['P'];
	$db = open_conn();
	
	$check = mysql_query("SELECT * FROM USER WHERE UCID = '$username'") or die(mysql_error());

	$info = $db->$check;
	
	while ($info = mysql_fetch_array($check)){
           if ($pass != $info['PASSWORD'])
	   {echo "Wrong ucid or password.";}
	   else if ($upass == $info['PASSWORD'])
	   {echo "Logged in.";}
	   }

	//$result = $db->query($query);

      }
?>