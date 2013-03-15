$(document).ready(function(){
	alert("1");
	$('#authen').click(function() {
	alert("2");
	/*
		$('#waiting').show(500);
		$('#demoForm').hide(0);
		$('#message').hide(0);
	*/
		$.ajax({
			type : 'POST',
			url : 'php/test.php',
			dataType : 'json',
			data: {
				email : $('#ucid').val()
			},
			success : function(data){
				
				alert(data.msg);
				//$('#waiting').hide(500);
				//$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success')
					//.text(data.msg).show(500);
				//if (data.error === true)
					//$('#demoForm').show(500);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
				alert("success");
				/*
				$('#waiting').hide(500);
				$('#message').removeClass().addClass('error')
					.text('There was an error.').show(500);
				$('#demoForm').show(500);*/
			}
		});

		return false;
	});
});

