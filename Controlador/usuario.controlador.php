<?php
include_once("../entidad/usuario.entidad.php");
include_once("../modelo/usuario.modelo.php");


$operacion= $_POST['operacion'];
$UsuarioE = new \entidadUser\User();

if ($operacion == 'Creo') {
    $nombre= $_POST['nombre'];
    $clave= $_POST['clave'];
    $UsuarioE->setNombre($nombre);
    $UsuarioE->setPassword($clave);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->crearUsuario();
}
else if ($operacion == 'Edito'){
    $id= $_POST['id'];
    $nombre= $_POST['nombre'];
    $clave= $_POST['clave'];
    $UsuarioE->setId($id);
    $UsuarioE->setNombre($nombre);
    $UsuarioE->setPassword($clave);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->actualizarDatos();
}else if($operacion == 'Validar'){
    $password= $_POST['clave'];
    $userE = new \entidadUser\User();
    $userE->setPassword($password);
    $userM = new \modeloUser\User($userE);
    $mensaje = $userM->validate();
}else if($operacion == 'Salir'){
    $userE = new \entidadUser\User();
    $userM = new \modeloUser\User($userE);
    $mensaje = $userM->salir();
}

unset($UsuarioE);
unset($UsuarioM);

echo json_encode($mensaje);
?>