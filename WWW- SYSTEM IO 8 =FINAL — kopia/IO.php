<!DOCTYPE html>
<?php
	include('cfg_IO.php');
	include('admin/admin_IO.php');
	
?>


<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<title>System_IO</title>
		<script src="./js/jquery-3.7.1.js"></script>
		<link rel="stylesheet" href="./css/system_IO.css">
	</head> 
	
	<a class="opcje" style="display: inline-block; padding: 0px; top: 25%; left: 50%; transform: translate(3%, 86%); " href="?action=ListaPodstron_kierowcy"> 
		<input class="buttontras" type="button" value="Kierowcy">
	</a>
	
	<a class="opcje" style="display: inline-block; padding: 0px; top: 25%; left: 50%; transform: translate(3%, 86%); " href="?action=ListaPodstron_miejsca"> 
		<input class="buttontras" type="button" value="Miejsca">
	</a>
	
	<a class="opcje" style="display: inline-block; padding: 0px; top: 25%; left: 50%; transform: translate(3%, 86%); " href="?action=IO.php"> 
		<input class="buttontras" type="button" value="Główna">
	</a>


	
	<!-- <a class="opcje" href="?action=ListaPodstron_przystanki"> Przystanki </a> -->
	
	<br><br>
	<?php

	//	echo 'Lista tras: ';
		ListaPodstron_trasy();
		?>
			

	</body>
</html>
