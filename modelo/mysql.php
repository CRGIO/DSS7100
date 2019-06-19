<?php
	
	/*
		en esta sección se configuran los valores para poder conectarse a la base de datos
		cambie si es necesario, el segundo valor de cada elemento, de acuerdo a la configuración
		que tiene Ud. en su estación de trabajo
	*/
	define("SERVIDOR","localhost");
	define("BASEDATOS","DSS7100");
	define("USUARIO","usuario");
	define("PASSWORD","123");

	/* Estas funciones pueden utilizar para enviar datos u obtener información desde la base de datos */ 

class mysql {
	/* este método se conectarse a la base de datos, se usa internamente */
	function Open() { 
		$link=mysqli_connect( SERVIDOR, USUARIO, PASSWORD, BASEDATOS ); 
		if (!($link)) { 
			echo "Error conectando a la base de datos."; 
			exit(); 
		} 
		return $link; 
	} 

	/* USE ESTA FUNCIÓN CADA VEZ QUE QUIERA EJECUTAR UNA QUERY EN LA BASE DE DATOS */
	function Ejecutar($sql) { 
		$l=Open(); 
		$res=$l->query($sql);  
		Close($l); 
		return $res; 
	} 

	/* USE ESTA FUNCIÓN PARA OBTENER DATOS CON UN SELECT, ESTA FUNCION DEVUELVE UNA MATRIZ */  
	function TraerDatos($sql) {  
		$l = open(); 
		$res = $l->query($sql); $arreglo=""; 
		if ($res!=false) { 
			while ($fila = mysqli_fetch_array($res, MYSQL_NUM)) { 
				$arreglo[] = $fila; 
			} 
		} 
		close($l); 
		return $arreglo; 
	} 

	/* esta función cierra la conexión a la base de datos, se usa internamente */
	function Close($l) { 
		mysqli_close($l); 
	}
}

?>