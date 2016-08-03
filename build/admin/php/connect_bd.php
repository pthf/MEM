<?php

	// // $mysql_host = "localhost";
	// // $mysql_user = "memgdl_memuser";
	// // $mysql_password = "C=#_AnUV=ozd";
	// // $mysql_database = "memgdl_memdatabase";
	// // $link = "";

	// $mysql_host = "localhost";
	// $mysql_user = "root";
	// $mysql_password = "";
	// $mysql_database = "mem";
	// $link = "";


	// function connect_base_de_datos (){
	// 	$GLOBALS['link'] = mysql_connect($GLOBALS['mysql_host'],$GLOBALS['mysql_user'],$GLOBALS['mysql_password'])
	// 		or die('No se pudo conectar: '.mysql_error());
	// 	mysql_select_db($GLOBALS['mysql_database']) or die('Error al conectar a la base de datos: '.$GLOBALS['mysql_database']);
	// 	mysql_set_charset('utf8');
	// }

	// function close_database(){
	// 	mysql_close($GLOBALS['link']);
	// }


?>

<?php
	class Conectar
	{
		//establecemos la conexión con la base de datos
		public static function con()
		{
			$con = mysqli_connect("localhost","root","","mem");
			mysqli_query($con,"SET NAMES 'utf8'");
			return $con;
		}
	}

?>
