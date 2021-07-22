<?php

abstract class Vehicule
{
    protected $_id;
    protected $_marque;
    protected $_modele;
    protected $_puissanceFiscale;
    protected $_poids;
    protected $_vitesse;

    const VIT_CAMPAGNE = 80;
    const VIT_ROCADE = 90;
    const VIT_AUTOROUTE = 130;

    public function __construct(array $data)
    {   /*
        $this->setId($_id);
        $this->setMarque($_marque);
        $this->setModele($_modele);
        $this->setPuissanceFiscale($_puissanceFiscale);
        $this->setPoids($_poids);
        $this->setVitesse($_vitesse);
        */
        $this->hydrate($data);
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
    private static $_messageAAfficher = "bien mon petit !";
    public static function message()
    {
        echo self::$_messageAAfficher;
    }

    abstract public function demarrer();

    final public function avancer($vitesseSouhaitee)
    {
        $this->_vitesse = $vitesseSouhaitee;
    }
    public function reculer()
    {
        $this->_vitesse = -2;
    }

    public function getId()
    {
        return $this->_id;
    }


    public function setId($_id)
    {
        if (is_string($_id)) {
            $this->_id = $_id;
        }
        return $this;
    }

    public function getVitesse()
    {
        return $this->_vitesse;
    }

    public function setVitesse($_vitesse)
    {
        $_vitesse = (float)$_vitesse;
        if ($_vitesse >= 0) {
            $this->_vitesse = $_vitesse;
        }
        return $this;
    }

    public function getPoids()
    {
        return $this->_poids;
    }

    public function setPoids($_poids)
    {
        $_poids = (float)$_poids;
        if ($_poids > 0) {
            $this->_poids = $_poids;
        }
        return $this;
    }

    public function getPuissanceFiscale()
    {
        return $this->_puissanceFiscale;
    }

    public function setPuissanceFiscale($_puissanceFiscale)
    {
        $_puissanceFiscale = (int)$_puissanceFiscale;
        if ($_puissanceFiscale > 0) {
            $this->_puissanceFiscale = $_puissanceFiscale;
        }

        return $this;
    }


    public function getModele()
    {
        return $this->_modele;
    }

    public function setModele($_modele)
    {
        if (is_string($_modele)) {
            $this->_modele = $_modele;
        }
        return $this;
    }

    public function getMarque()
    {
        return $this->_marque;
    }


    public function setMarque($_marque)
    {
        if (is_string($_marque)) {

            $this->_marque = $_marque;
        }

        return $this;
    }

    public function hydrate(array $data)
    {/*
        if (isset($data["id"])) {
            $this->setId($data["id"]);
        }
        if (isset($data["marque"])) {
            $this->setMarque($data["marque"]);
        }
        if (isset($data["modele"])) {
            $this->setModele($data["modele"]);
        }
        if (isset($data["puissanceFiscale"])) {
            $this->setPuissanceFiscale($data["puissanceFiscale"]);
        }
        if (isset($data["poids"])) {
            $this->setPoids($data["poids"]);
        }
        if (isset($data["vitesse"])) {
            $this->setVitesse($data["vitesse"]);
        }*/
        //-----------------------------
        //
        //-----------------------------
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}