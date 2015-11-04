function valida()
{		
	if($('#username').val() =='' || $('#username').val() ==' ')
	{				
		$('#username').addClass("error_campo");
		return false;
	}

	if($('#password').val()=='' || $('#password').val() ==' ')
	{				
		$('#password').addClass("error_campo");				
		return false;
	}
	
	$("#passwordaux").val(md5($('#password').val()));
	$('#password').val('');
		
	
	$('#formulario').submit();
}



function firma_usuario(e)
{	
	var obj_usr = $('#username').val();
	var obj_pass = $('#password').val();

	var tecla = (document.all) ? e.keyCode : e.which;
	
	if(tecla==13 && obj_usr.length>0 && obj_pass.length>0)
	{
		valida();
	}
}



$(document).ready(function() {
	
	$('#username').focus(function() {										
		$('#username').removeClass("error_campo");						
	});
	
	$('#password').focus(function() {						
		$('#password').removeClass("error_campo");		
	});
	
});