<?php 
namespace entidadPlan;

class Plan {
    private $id;
    private $nombre;
    private $descripcion;
    private $cantidad_dias;
    private $id_libro;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of cantidad_dias
     */ 
    public function getCantidadDias()
    {
        return $this->cantidad_dias;
    }

    /**
     * Set the value of cantidad_dias
     *
     * @return self
     */ 
    public function setCantidadDias($cantidad_dias)
    {
        $this->cantidad_dias = $cantidad_dias;

        return $this;
    }

    /**
     * Get the value of id_libro
     */ 
    public function getIdLibro()
    {
        return $this->id_libro;
    }

    /**
     * Set the value of id_libro
     *
     * @return self
     */ 
    public function setIdLibro($id_libro)
    {
        $this->id_libro = $id_libro;

        return $this;
    }
}
?>
