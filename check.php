<?php
	/*
	front end
		get data from form
		send it as a JSON object to middle guys php
	middle end
		he passes the data to back end php 
	back end
		the back end does the query call
	*/

	$dbhost = 'sql.njit.edu';
	$dbuser = 'thh4';
	$dbpass = 'yapping45';
	$dbname = 'thh4';
      
	if(isset($_POST['U'] && isset($_POST['P']))
	{
		$username=stripslashes($_POST['U']); 
		$password=stripslashes($_POST['P']); 
	}
	mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error()); 
    mysql_select_db("$dbname") or die(mysql_error()); 

	$sql = "SELECT * FROM USER WHERE UCID='$username' and PASSWORD='$password'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	$info = mysql_fetch_row($result);

		if($count==1){
		
		session_start();
		$ucid =  $info[0];
		$id =  $info[1];
		$fname =  $info[2];
		$lname =  $info[3];
		$address = $info[4];
		
		$_SESSION['ucid'] = $ucid;
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		
		$student = array('UCID' => $ucid,'ID' => $id, 'FNAME' => $fname, 'LNAME' => $lname, 'ADDRESS' => $address);
		echo json_encode($student);
	}
		else {
		echo "Wrong Username or Password";}
?>