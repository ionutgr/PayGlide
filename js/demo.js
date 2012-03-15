$(function(){

    // Color Picker for Demo

    $('#in-header').ColorPicker({
            color: '222936',
    	onShow: function (colpkr) {
    		$(colpkr).fadeIn(500);
    		return false;
    	},
    	onHide: function (colpkr) {
    		$(colpkr).fadeOut(500);
    		return false;
    	},
    	onChange: function (hsb, hex, rgb) {
                $('header').css('backgroundColor', '#' + hex);
                $('#in-header').css('backgroundColor', '#' + hex);
                createCookie( 'headerCss', hex );
    	}
    });

    // Cookies for Demo

	$('#in-nav').ColorPicker({
            color: '222936',
    	onShow: function (colpkr) {
    		$(colpkr).fadeIn(500);
    		return false;
    	},
    	onHide: function (colpkr) {
    		$(colpkr).fadeOut(500);
    		return false;
    	},
    	onChange: function (hsb, hex, rgb) {
                $('nav, .sf-menu li li, .sf-menu li li li, #sidebar').css('backgroundColor', '#' + hex);
                $('#in-nav').css('backgroundColor', '#' + hex);
                createCookie( 'navCss', hex );
    	}
    });

	$('#in-widget').ColorPicker({
            color: '222936',
    	onShow: function (colpkr) {
    		$(colpkr).fadeIn(500);
    		return false;
    	},
    	onHide: function (colpkr) {
    		$(colpkr).fadeOut(500);
    		return false;
    	},
    	onChange: function (hsb, hex, rgb) {
                $('.widget').css('backgroundColor', '#' + hex);
                $('#in-widget').css('backgroundColor', '#' + hex);
                createCookie( 'widgetCss', hex );
    	}
    });

    var headerCss = readCookie('headerCss')
    var navCss = readCookie('navCss')
    var widgetCss = readCookie('widgetCss')

    if( headerCss != null ) {
		$('header').css('backgroundColor', '#' + headerCss);
		$('#in-header').css('backgroundColor', '#' + headerCss);
	}

    if( navCss != null ) {
		$('nav').css('backgroundColor', '#' + navCss);
		$('.sf-menu li li').css('backgroundColor', '#' + navCss);
		$('.sf-menu li li li').css('backgroundColor', '#' + navCss);
		$('#in-nav').css('backgroundColor', '#' + navCss);
                $('#sidebar').css('backgroundColor', '#' + navCss);
	}

    if( widgetCss != null ) {
		$('.widget').css('backgroundColor', '#' + widgetCss);
		$('#in-widget').css('backgroundColor', '#' + widgetCss);
	}


	$('#colorChanger').change(function(){
			var str = $(this).val();
			var colors = str.split(',');

			$('header').css('backgroundColor', '#' + colors[0]);
			$('nav, .sf-menu li li, .sf-menu li li li').css('backgroundColor', '#' + colors[1]);
			$('.widget').css('backgroundColor', '#' + colors[2]);
			$('#in-header').css('backgroundColor', '#' + colors[0]);
			$('#in-nav').css('backgroundColor', '#' + colors[1]);
                        $('#sidebar').css('backgroundColor', '#' + colors[1]);
			$('#in-widget').css('backgroundColor', '#' + colors[2]);

			//update cookies
			createCookie( 'headerCss', colors[0] );
			createCookie( 'navCss', colors[1] );
			createCookie( 'widgetCss', colors[2] );
	});

});