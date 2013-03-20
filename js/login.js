$(document).ready(function(){

	//load all predefined div's etc.. that are supposed to be hidden
	$("#err").hide();

	alert("document ready1");
	//GLOBALS
	var ucid;
	var pwd;
	
	$("#loginform").submit(function()
	{
		event.preventDefault(); //prevents the form from doing the default action=""
		ucid = $("#ucid").val();
		pwd = $("#pass").val();
		
		//comment!		
		if((ucid != null)&& (pwd != null))
		{
			alert(ucid);
			alert(pwd);
			
			$.ajax({
			  type: "POST",
			  url: "check.php",
			  data:{U:ucid,P:pwd}
			}).done(function( data ) {
			  alert(data);
			});
			
			//send data.
		}
		else if(ucid == "" && pwd == "")
		{
			//show some error message.
			$("#err").show();
		}
	});
	
	
	
});

