<?php

class  VehiculeManager
{
    private $_db; //correspondra à l'instance PDO pour la connexion à la BDD
    private $_param; // paramètre contenant les comandes sql en fonction du type d'objet
    public function __construct($_db)
    {
        $this->setDb($_db);
    }


    public function setDb($db)
    {
        $this->_db = $db;
    }
    public function add($vehic)
    {

        $this->prepareFor($vehic);
        $par = $this->get_param();
        //on !! PREPARE !! la requete
        $req = $this->_db->prepare(
            "INSERT  INTO vehicules  (" . $par->getSqlColString() . ")
             VALUE (" . $par->getSqlPreparedValues() . ")"
        );


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
        $tabVehic = [];
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

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

    /**
     * Get the value of _param
     */
    public function get_param()
    {
        return $this->_param;
    }

    /**
     * Set the value of _param
     *
     * @return  self
     */
    public function set_param($param)
    {

        $this->_param = $param;

        return $this;
    }
    public function prepareFor($obj)
    {

        $col = $obj->getAttributs();



        $this->set_param(new ManagerParameters($col));
    }
}