<?php 
namespace entidadPlanUser;

class PlanUser {
    private $id;
    private $id_user;
    private $id_plan;
    private $fecha_inicio;
    private $fecha_fin;

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
     * Get the value of id_user
     */ 
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return self
     */ 
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_plan
     */ 
    public function getIdPlan()
    {
        return $this->id_plan;
    }

    /**
     * Set the value of id_plan
     *
     * @return self
     */ 
    public function setIdPlan($id_plan)
    {
        $this->id_plan = $id_plan;

        return $this;
    }

    /**
     * Get the value of fecha_inicio
     */ 
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set the value of fecha_inicio
     *
     * @return self
     */ 
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Get the value of fecha_fin
     */ 
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set the value of fecha_fin
     *
     * @return self
     */ 
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }
}
?>
