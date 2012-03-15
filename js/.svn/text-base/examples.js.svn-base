$(function(){

    //Table Odd/Even styles
   $("table:not(.simple) tr:nth-child(odd)").addClass("odd"); // Table Odd/Even
   $("table:not(.simple) tr:nth-child(even)").addClass("even"); // Table Odd/Even

   //input titles to label
   $(":text").labelify({labelledClass: "inputHighlight" });

   //Gallery pop-ins
   $('.gallery .hor-list').each(function(){
        $(this).hide();
    });

    $('.gallery li img').hover(function(){
        $(this).next('.hor-list').show();
    }, function(){
       $(this).next('.hor-list').hide();
    });

    //jQuery UI Tabs
   $('.tabs').tabs();
   //jQuery UI Slider
    $( ".slider" ).slider();
    $(".slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ]
    });
    
   //jQuery UI Progressbar
   $( ".progressbar" ).progressbar({
            value: 67
    });

    //jQuery UI Dialog
    //$( "#dialog" ).dialog({
    //    modal: true
    //});

    //jQuery UI Datepicker
    $( ".datepicker" ).datepicker();

    //Datatable
    $('.dataTable').dataTable({
        "sPaginationType": "full_numbers",
        "bJQueryUI": true
    });

    //Selectmenu
    $('.forcewidth').selectmenu({width:120});
    $('select').selectmenu();

    // iOS checkbox
   $('.ioscheckbox').iphoneStyle({
        checkedLabel: 'On',
        uncheckedLabel: 'Off'
    });

    // Menu
    $('ul.sf-menu').superfish();

    // wysiwyg editor
    $(".editor").cleditor({
        width: 620
    });

    // message fadeout on click
    $('.msg').click(function(){
		$(this).fadeOut();
		return false;
	});
	
	$('.close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});

    // Tipsy
    $('#focus-example [title]').tipsy({trigger: 'focus', gravity: 'w'});
    $('#north').tipsy({gravity: 'n'});
    $('#south').tipsy({gravity: 's'});
    $('#east').tipsy({gravity: 'e'});
    $('#west').tipsy({gravity: 'w'});
    $('#north-west').tipsy({gravity: 'nw'});
    $('#north-east').tipsy({gravity: 'ne'});
    $('#south-west').tipsy({gravity: 'sw'});
    $('#south-east').tipsy({gravity: 'se'});

    //ColorBox
    $("a[rel='example1']").colorbox();
    $("a[rel='example2']").colorbox({transition:"fade"});
    $("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
    $("a[rel='example4']").colorbox({slideshow:true});
    $(".example5").colorbox();
    $(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});
    $(".example7").colorbox({width:"80%", height:"80%", iframe:true});
    $(".example8").colorbox({width:"50%", inline:true, href:"#inline_example1"});

    $(".example9").colorbox({
            onOpen:function(){ alert('onOpen: colorbox is about to open'); },
            onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
            onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
            onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
            onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
    });
    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function(){
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
    });

});
