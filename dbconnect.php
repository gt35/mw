 <?php
 
 $con = mysql_connect("sql.njit.edu", "thh4", "yapping45") or die(mysql_error());
 
	if(!$con)
	{
		echo "Error Connection to Database";
	}
	else if($con)
	{
		echo "Connected To Database";
	}
 
 mysql_select_db(thh4, $con);
 
 
 
?>		
