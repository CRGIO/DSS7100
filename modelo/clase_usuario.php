<?php

class clUsuario extends mysql {
	
	public $usuario;
	public $password;

	function agregar() {
		$sql  = "insert into usuario ( usuario, password ) ";
		$sql .= " values ('$this->usuario','$this->password') ";
		$this->ejecutar($sql);
	}

	function verificar() {
		$sql = "select * from usuario where usuario='$usuario' and password='$password' ";
		$datos = $this->traerdatos($sql);
		if(is_array($datos)) {
			return true;
		} else {
			return false;
		}
	}
}

?>