<?php

  /* agregar todas las reglas de negocio que use la interfaz  */
  include "modelo/mysql.php";
  include "modelo/clase_usuario.php";

  /* dar un valor inicial a todas las variables mostradas en el HTML */
  $usuario = "";
  $password = "";
  $mensaje = "";

  /* definir todos los objetos a utilizar  */
  $ousuario = new clase_usuario();

  /* verificar si se presionó el botón y colocar código del lado del servidor */
  if (isset($_POST["aceptar"])) {
    
    /* recuperar los datos del cliente y pasarselos a la clase */
    $ousuario->usuario = $_POST["usuario"];
    $ousuario->password = $_POST["password"];

    /* ejecutar los métodos correspondientes */
    $respuesta = $ousuario->verificar();
    if ($respuesta==TRUE) {
      // el usuario está en la base de datos y se redirecciona a la página prinipal
      header('Location: principal.php');
    } else {
      $mensaje = "el usuario no está registrado en la base de datos";
    }

  }

  /* agregar la llamada a la vista */
  include "vista/login.html";

?>