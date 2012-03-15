jQuery(document).ready(function($) {
	var uploader = 'others/uploadify.swf';
	var script = 'others/uploadify.php';
	var cancelImg = 'images/cancel.png';
	var folder = 'others';
	
	$('#single_file').uploadify({
		'uploader'  : uploader,
		'script'    : script,
		'cancelImg' : cancelImg,
		'folder'    : folder,
		'auto'      : true,
		'removeCompleted' : false,
		'buttonText' : 'Single File Auto'
	});
	
	$('#single_file1').uploadify({
		'uploader'  : uploader,
		'script'    : script,
		'cancelImg' : cancelImg,
		'folder'    : folder,
		'auto'      : false,
		'removeCompleted' : false,
		'buttonText' : 'Single File Manual'
	});
	
	$('#multi_file').uploadify({
		'uploader'  : uploader,
		'script'    : script,
		'cancelImg' : cancelImg,
		'folder'    : folder,
		'auto'      : false,
		'multi'     : true,
		'removeCompleted' : false,
		'buttonText' : 'Multi File'
	});
	
	$('#upload_image').uploadify({
		'uploader'  : uploader,
		'script'    : script,
		'cancelImg' : cancelImg,
		'folder'    : folder,
		'auto'      : true,
		'fileExt'   : '*.jpg;*.gif;*.png',
		'fileDesc'  : 'Image Files (.JPG, .GIF, .PNG)',
		'removeCompleted' : false,
		'buttonText' : 'Image Only'
	});
	
	
});
