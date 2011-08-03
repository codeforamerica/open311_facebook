$(document).ready(function(){
    $("#group select").change( function() {
       $.ajax({
		  url: "home/get_services_selector/" + $(this).val(),
		  success: function(data){
				$('#service').html(data).hide().fadeIn();
		        $("#service select").change(function(){
		        	$('#service .description').hide();
		    		$('#'+$(this).val() + '_description').fadeIn();
		    });
		  }
		});
    });
    
    $("#submit").click(function(){
    	$('form').submit();
    })
    
    $('#address_string').change(function(){
    	codeAddress($(this).val());
    })
    $('#mapit').click(function(){
    	codeAddress($('#address_string').val());
    })
    
    $('#address_string').bind('keypress', function(e) {
        if(e.keyCode==13){
        	codeAddress($('#address_string').val());
        return false;
        }
	});
    
});

