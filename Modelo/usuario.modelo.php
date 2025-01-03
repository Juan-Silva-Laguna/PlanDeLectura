<?php
namespace modeloUser;
use PDO;

include_once("../Entidad/usuario.entidad.php");
include_once("../Entorno/conexion.php");
class User{
    private $password;
    private $nombre;
    private $id;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadUser\User $userE)
    {
        $this->conexion = new \Conexion();
        $this->password=$userE->getPassword();  
        $this->nombre=$userE->getNombre();  
        $this->id=$userE->getId();    
    }

    public function validate()
    {
       $this->consulta="SELECT * FROM users WHERE clave='$this->password'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $user = $this->resultado->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['clave'] = $user['clave'];
            $this->retorno=['message'=>'Bienvenido(a) '.$_SESSION['nombre'].' ', 'status'=>'success'];
       }
       else{
        $this->retorno=['message'=>'Codigo no reconocido','status'=>'error'];
       }
       return $this->retorno;
    }

    public function salir()
    {
       session_start();      
       $this->retorno=['message'=>'Hasta Pronto '.$_SESSION['nombre'], 'status'=>'info'];;
       session_destroy();
       return $this->retorno;
    }

    public function crearUsuario()
    {
       $this->consulta="INSERT INTO users VALUES(null, '$this->nombre', '$this->password')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       // Verifica si la inserción fue exitosa y obtiene el último ID insertado
        if ($this->resultado->rowCount() >= 1) {
            $this->retorno = $this->conexion->con->lastInsertId(); // Devuelve el ID del último registro insertado
        } else {
            $this->retorno = null; // Retorna 0 en caso de error o si no hubo inserción
        }
       return $this->retorno;
    }

    public function actualizarDatos()
    {
        $this->consulta="UPDATE users SET nombre='$this->nombre', clave='$this->password' WHERE id='$this->id'";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        return $this->resultado->rowCount();
    }

}
?>