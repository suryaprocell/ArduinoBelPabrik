<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JADWAL BEL PERUSAHAAN</title>
<link href="css/ui-lightness/jquery-ui-1.9.1.custom.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/loading.css" />
<link rel="stylesheet" href="css/jquery.appendGrid-1.3.1.css" />

<script src="js/jquery-1.8.2.js"></script>
<script src="js/jquery-ui-1.9.1.custom.min.js"></script>
<script src="js/jquery.appendGrid-1.3.1.js"></script>
<script>
$(document).ready(function(){

	$("#loading").ajaxStart(function(){
		//$('#content').hide();
		$(this).show();
	}).ajaxStop(function(){
		$(this).fadeOut('slow');
		//$('#content').show(1000);
	});

	$('#content').load('show_jadwal.php').fadeIn();

});
</script>

</head>

<body>

<div align="center" id="loading" class="ui-widget">Loading...</div>
<div align="center" id="info" class="ui-widget effect1 ui-corner-all">INFO....</div>
<div id="hasil" class="ui-widget" style="font-size:small">
    	<div id="content"></div>
</div>

</body>

</html
