$(document).ready(function()
{
	$('.acc_container').hide(); 
	$('.acc_trigger:first').addClass('active').next().show(); 
	$("ul.tabs li").click(function() {

		var request = $(this).find("a").text().toLowerCase(); //Find the href attribute value to identify the active tab + content
		$.get('./'+request, function(data)
		{
			alert(data);
		});
	});
	
	$('#stats li').click(function()
	{
		var request=$('ul.tabs li.active').text().toLowerCase()+'/report_type/'+$(this).parents().find('.tab_content').find('.acc_trigger.active').text().toLowerCase().split(" ").join("_")+"/sub_report/"+$(this).text().toLowerCase().split(" ").join("_");
		$.get('./'+request, function(data)
		{
			$('#ciummy').html(data);
		});
	});
	
	
}); 

//Accordion #2
	$('#acc_container2').hide(); //Hide/close all containers
	$('#acc_trigger2:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container
	
	//On Click
	$('#acc_trigger2').click(function(){
		if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
			$('#acc_trigger2').removeClass('active').next().slideUp(); //Remove all "active" state and slide up the immediate next container
			$(this).toggleClass('active').next().slideDown(); //Add "active state to clicked trigger and slide down the immediate next container
		}
		return false; //Prevent the browser jump to the link anchor
	});