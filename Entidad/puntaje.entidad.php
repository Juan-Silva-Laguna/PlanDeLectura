<?php 
namespace entidadPuntaje;

class Puntaje {
    private $id;
    private $id_plan_user;
    private $id_evaluacion_sub_item;
    private $id_evaluacion_item;
    private $fecha;
    private $respuesta;
    private $aprobo;

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
     * Get the value of id_plan_user
     */ 
    public function getIdPlanUser()
    {
        return $this->id_plan_user;
    }

    /**
     * Set the value of id_plan_user
     *
     * @return self
     */ 
    public function setIdPlanUser($id_plan_user)
    {
        $this->id_plan_user = $id_plan_user;

        return $this;
    }

    /**
     * Get the value of id_evaluacion_sub_item
     */ 
    public function getIdEvaluacionSubItem()
    {
        return $this->id_evaluacion_sub_item;
    }

    /**
     * Set the value of id_evaluacion_sub_item
     *
     * @return self
     */ 
    public function setIdEvaluacionSubItem($id_evaluacion_sub_item)
    {
        $this->id_evaluacion_sub_item = $id_evaluacion_sub_item;

        return $this;
    }

    /**
     * Get the value of id_evaluacion_item
     */ 
    public function getIdEvaluacionItem()
    {
        return $this->id_evaluacion_item;
    }

    /**
     * Set the value of id_evaluacion_item
     *
     * @return self
     */ 
    public function setIdEvaluacionItem($id_evaluacion_item)
    {
        $this->id_evaluacion_item = $id_evaluacion_item;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of respuesta
     */ 
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set the value of respuesta
     *
     * @return self
     */ 
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get the value of aprobo
     */ 
    public function getAprobo()
    {
        return $this->aprobo;
    }

    /**
     * Set the value of aprobo
     *
     * @return self
     */ 
    public function setAprobo($aprobo)
    {
        $this->aprobo = $aprobo;

        return $this;
    }
}
?>
