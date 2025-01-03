<?php
namespace modeloLibro;
use PDO;

include_once("../entidad/libro.entidad.php");
include_once("../entorno/conexion.php");
class Libro{
    private $idLibro;
    private $nombreLibro;
    private $descripcion;
    private $autor;
    private $imagen;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadLibro\Libro $LibroE)
    {
        $this->conexion = new \Conexion();
        $this->idLibro=$LibroE->getId();  
        $this->nombreLibro=$LibroE->getNombre();  
        $this->descripcion = $LibroE->getDescripcion(); 
        $this->imagen = $LibroE->getImagen(); 
        $this->autor = $LibroE->getAutor(); 
    }

    public function crearLibro()
    {
       $this->consulta="INSERT INTO libros VALUES(null, '$this->imagen', '$this->nombreLibro', '$this->autor', '$this->descripcion')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);

       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
         $this->retorno=['message'=>'Libro Agregado','status'=>'success'];
      }
       else{
         $this->retorno=['message'=>'Error al agregar','status'=>'error'];
       }
       return $this->retorno;
    }

    public function mostrarLibros()
    {
       $this->consulta="SELECT * FROM libros";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerLibro()
    {
       $this->consulta="SELECT * FROM libros WHERE id='$this->idLibro'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function mostrarLibrosAleatorios()
   {
      // Consulta para traer 3 categorías aleatorias
      $this->consulta = "
         SELECT * 
         FROM libros 
         ORDER BY RAND() 
         LIMIT 3
      ";

      $this->resultado = $this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();

      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }


    public function eliminarLibro()
   {
      // Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM libros WHERE id = :idLibro";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idLibro', $this->idLibro, PDO::PARAM_INT);
      $stmt->execute();
      $libro = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($libro) {
         $imagen = $libro['imagen'];
         
         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         // Paso 3: Eliminar el registro de la categoría
         $this->consulta = "DELETE FROM libros WHERE id = :idLibro";
         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->bindParam(':idLibro', $this->idLibro, PDO::PARAM_INT);
         $this->resultado->execute();
         
         if ($this->resultado->rowCount() >= 1) {
               $this->retorno = 1;
         } else {
               $this->retorno = 0;
         }
      } else {
         // La categoría no existe
         $this->retorno = 0;
      }

      return $this->retorno;
   }


    public function consultarEditar()
    {
       $this->consulta="SELECT * FROM libros WHERE id='$this->idLibro'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarLibro()
    {
      // Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM libros WHERE id = :idLibro";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idLibro', $this->idLibro, PDO::PARAM_INT);
      $stmt->execute();
      $libro = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($libro) {
         $imagen = $libro['imagen'];
         
         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         if ($this->imagen != null) {
            $this->consulta="UPDATE libros SET nombre='$this->nombreLibro', descripcion='$this->descripcion', imagen='$this->imagen' WHERE id='$this->idLibro'";
         }else{
            $this->consulta="UPDATE libros SET nombre='$this->nombreLibro', descripcion='$this->descripcion' WHERE id='$this->idLibro'";
         }
         
         $this->resultado=$this->conexion->con->prepare($this->consulta);   
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno=1;
         }
         else{
           $this->retorno=0;
         }
      }
         return $this->retorno;    






         
    }
}

?>