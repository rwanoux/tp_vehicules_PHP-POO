<?php


class Camion extends Vehicule
{
    private $_cargaison;
    private $_capaStockage;
    private $_vehicType;


    public function  __construct(array $data)
    {
        parent::__construct($data);
        $this->setVehicType("camion");
    }
    public function setVehicType($type)
    {
        $this->_vehicType = $type;
        return $this;
    }
    public function getVehicType()
    {
        return $this->_vehicType;
    }
    public function getAttributs()
    {

        return get_object_vars($this);
    }
    public function chargerCargaison()
    {
    }
    public function demarrer()
    {
        echo 'Prrr Brrr Brrr';
    }

    /**
     * Get the value of _cargaison
     */
    public function getCargaison()
    {
        return $this->_cargaison;
    }

    /**
     * Set the value of _cargaison
     *
     * @return  self
     */
    public function setCargaison($_cargaison)
    {
        $this->_cargaison = $_cargaison;

        return $this;
    }

    /**
     * Get the value of _capaStockage
     */
    public function getCapaStockage()
    {
        return $this->_capaStockage;
    }

    /**
     * Set the value of _capaStockage
     *
     * @return  self
     */
    public function setCapaStockage($_capaStockage)
    {
        $this->_capaStockage = $_capaStockage;

        return $this;
    }
}