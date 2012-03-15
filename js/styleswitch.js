/**
* Styleswitch stylesheet switcher built on jQuery
* Under an Attribution, Share Alike License
* By Kelvin Luck ( http://www.kelvinluck.com/ )
**/

jQuery(document).ready(function($) {
	
		$('a.styleswitcher').click(function() {
			var rel = $(this).attr("rel");
			switchStylestyle(this.getAttribute("rel"));
			return false;
		});
		
		var c = readCookie('cstyle');
		if (c)
            switchStylestyle(c);
        else
            switchStylestyle("fixed");
	

	function switchStylestyle(styleName)
	{
        //	<link id='sfluid' rel="stylesheet" type="text/css" href="style/fluid.css" title="fluid" media="screen" />
		$(".sswitch").attr("disabled",true);
		$("#s"+styleName).attr("disabled",false);
        createCookie('cstyle', styleName, 365);
	}
});

// cookie functions http://www.quirksmode.org/js/cookies.html
function createCookie(name,value,days)
{
	if (days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name)
{
	createCookie(name,"",-1);
}
// /cookie functions
