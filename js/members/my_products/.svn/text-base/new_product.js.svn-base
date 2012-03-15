$(document).ready(function()
{
	//Accordion
	$('.acc_container').hide(); //Hide/close all containers
	$('.acc_trigger:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container
	
	//On Click
	$('.acc_trigger').click(function(){
		if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
			$('.acc_trigger').removeClass('active').next().slideUp(); //Remove all "active" state and slide up the immediate next container
			$(this).toggleClass('active').next().slideDown(); //Add "active" state to clicked trigger and slide down the immediate next container
    		
			var settings = $('#product_form').validate().settings;
			
			$('input[name^=accx_]').removeClass('required number ');
			$('input[name^=accx_]:visible').addClass('required number');
			
		}
		return false; //Prevent the browser jump to the link anchor
	});


	$('input[name^="accx_"]').removeClass('required');
	$('input[name^="accx_"]:visible').addClass('required');

	$("#product_form").validate();
	
	//On Click
	$('#prod_exp_lnk_trigger').click(function(){
		
		if( $("#dwld_lnk_exp").css("display")=="none" ) 
		{
			$('#prod_exp_lnk_trigger').addClass('active1'); 
			$('#dwld_lnk_exp').slideDown();
		}
		else
		{
			$('#prod_exp_lnk_trigger').removeClass('active1'); 
			$('#dwld_lnk_exp').slideUp();
		}
		return false; //Prevent the browser jump to the link anchor
	});
	
	
	
	//payment plans
	
	

});
