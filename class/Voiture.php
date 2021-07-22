<?php


final class Voiture extends Vehicule
{
    private $_nbrPassagers;
    private $_tailleCoffre;
    private $_vehicType;
    public function  __construct(array $data)
    {
        parent::__construct($data);
        $this->setVehicType("voiture");
    }

    public function getAttributs()
    {
        return get_object_vars($this);
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
    public function allumerAutoRadio()
    {
    }
    public function demarrer()
    {
        echo 'Vroooooommm';
    }

    /**
     * Get the value of _nbrPassagers
     */
    public function getNbrPassagers()
    {
        return $this->_nbrPassagers;
    }

    /**
     * Set the value of _nbrPassagers
     *
     * @return  self
     */
    public function setNbrPassagers($_nbrPassagers)
    {
        $this->_nbrPassagers = $_nbrPassagers;

        return $this;
    }

    /**
     * Get the value of _tailleCoffre
     */
    public function getTailleCoffre()
    {
        return $this->_tailleCoffre;
    }

    /**
     * Set the value of _tailleCoffre
     *
     * @return  self
     */
    public function setTailleCoffre($_tailleCoffre)
    {
        $this->_tailleCoffre = $_tailleCoffre;

        return $this;
    }
}