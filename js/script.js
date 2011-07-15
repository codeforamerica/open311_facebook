$(document).ready(function(){
 
    $("#group select").change( function() {
       $.ajax({
		  url: "home/get_services_selector/" + $(this).val(),
		  success: function(data){
		    $('#service').html(data);
		        $("#service select").change(function(){
		        	$('#service .description').hide();
		    		$('#'+$(this).val() + '_description').show();
		    });
		  }
		});
    });
    

});
