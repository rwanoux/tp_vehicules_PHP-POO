<?php

class  VehiculeManager
{
    //---------ATTRIBUTS-----------------
    private $_db; //correspondra à l'instance PDO pour la connexion à la BDD
    private $_param; // paramètre contenant les comandes sql en fonction du type d'objet

    //----------CONSTRUCT-------------
    public function __construct($_db)
    {
        $this->setDb($_db);
    }

    //---------------METHODS---------------


    //--------getter setter
    public function setDb($db)
    {
        $this->_db = $db;
    }
    public function getDb($db)
    {
        return $this->_db = $db;
    }
    public function get_param()
    {
        return $this->_param;
    }
    public function set_param($param)
    {
        $this->_param = $param;
        return $this;
    }


    //----------ACTIONS
    //-------------------

    public function add($vehic)
    {
        //parametres depending of object type
        $this->prepareFor($vehic);
        //recupération des parametres
        $par = $this->get_param();
        //on !! PREPARE !! la requete
        $req = $this->_db->prepare(
            "INSERT  INTO vehicules  (" . $par->getSqlColString() . ")
             VALUE (" . $par->getSqlPreparedValues() . ")"
        );
        //on bind les values selon les parametres
        foreach ($par->getSqlCol() as $key => $value) {
            $method = 'get' . ucfirst($value);
            if (method_exists($vehic, $method)) {
                switch (gettype($vehic->$method())) {
                    case "string":
                        $req->bindValue(":" . $value, $vehic->$method(), PDO::PARAM_STR);
                        break;
                    case "integer":
                        $req->bindValue(":" . $value, $vehic->$method(), PDO::PARAM_INT);
                        break;

                    default:
                        $req->bindValue(":" . $value, $vehic->$method());
                        break;
                }
            }
        }
        //on execute la requete
        $req->execute();
    }


    public function delete($id)
    {
        //on  !!PREPARE !! la requete
        $req = $this->_db->prepare(
            "DELETE FROM Vehicules 
            WHERE id=:id"
        );
        $req->bindValue(":id", $id);

        $req->execute();
    }


    public function getById($id)
    {
        //pas de prepare sur les select
        $req = $this->_db->query(
            "SELECT * FROM Vehicules
            WHERE id = '" . $id . "'"
        );
        $data = $req->fetch(PDO::FETCH_ASSOC);

        //selon les données l'objet retourné serra de type different
        if ($data["vehicType"] == "voiture") {
            return new Voiture($data);
        }
        if ($data["vehicType"] == "camion") {
            return new Camion($data);
        }
    }

    public function  getAll()
    {
        $req = $this->_db->query(
            "SELECT * FROM vehicules"
        );
        //l'array d'objet retournés
        $tabVehic = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            //selon les données l'objet retourné serra de type different
            if ($data["vehicType"] == "voiture") {
                array_push($tabVehic, new Voiture($data));
            } else if ($data["vehicType"] == "camion") {
                array_push($tabVehic, new Camion($data));
            }
        }
        return $tabVehic;
    }




    public function getByType($type)
    {
        $req = $this->_db->query(
            "SELECT * FROM Vehicules WHERE vehicType = '" . $type . "'"
        );
        $tabVehic = [];
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            if ($data["vehicType"] == "voiture") {
                $tabVehic[] = new Voiture($data);
            } else if ($data["vehicType"] == "camion") {
                $tabVehic[] = new Camion($data);
            }
        }
        return $tabVehic;
    }



    public function update($vehic)
    {
        $this->prepareFor($vehic);
        $par = $this->get_param();
        //on !! PREPARE !! la requete
        $req = $this->_db->prepare(
            "UPDATE  vehicules  
            SET " . $par->getSqlUpdateString() .
                "WHERE id='" . $vehic->getId() . "'"
        );
        //on execute la requete
        $req->execute();
    }

    public function prepareFor($obj)
    {
        $col = $obj->getAttributs();
        $this->set_param(new ManagerParameters($col));
    }
}