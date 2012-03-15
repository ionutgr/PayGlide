$(document).ready(function()
{
	$("#country").change(function() {
		$.ajax({
		  url: "/members/my_account/ajax_do_get_state/"+$("#country option:selected").val(),
		  cache: false,
		  success: function(html){
			$("select#state").html(html);
			$("select#state").selectmenu();
		  }
		});  
	});
	
	$("#save").click(function(){
		$.ajax({
		  type: "POST",
		  url: "/members/my_account/ajax_do_save_profile/",
		  data:  $("form#profile").serialize(),
		  success: function(html){
			
		  }
		});  
	});

});
