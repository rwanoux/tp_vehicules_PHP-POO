<?php
//---------------------------
//------------gestion des formulaires
//------------action du manager

//---------ADD----------------
if (isset($_POST["submitNew"]) && $_POST["submitNew"] == "newVehicule") {

    if ($_POST["vehicType"] == "voiture") {
        $myManager_Vehicule->add(new Voiture($_POST));
    }
    if ($_POST["vehicType"] == "camion") {
        $myManager_Vehicule->add(new Camion($_POST));
    }
}



//----------------DELETE
if (isset($_POST["delete"]) && $_POST["delete"] == "delete") {
    $myManager_Vehicule->delete($_POST["id"]);
}




//--------------EDIT
//---------declarer le véhicule à éditer
if (isset($_POST["edit"]) && $_POST["edit"] == "prepareEdit") {
    $vehiculeToEdit = $myManager_Vehicule->getById($_POST["id"]);
    var_dump($vehiculeToEdit);
}
//---------modifie le véhicule à éditer
if (isset($_POST["edit"]) && $_POST["edit"] == "doEdit") {
    if ($_POST["vehicType"] == "camion") {
        $vehiculeToUpdate = new Camion($_POST);
    }
    if ($_POST["vehicType"] == "voiture") {
        $vehiculeToUpdate = new Voiture($_POST);
    }
    $myManager_Vehicule->update($vehiculeToUpdate);
}



//----------------selectiv filter
$vehiculeList;
if (isset($_POST["selective"])) {
    switch ($_POST["selective"]) {
        case "all":
            $vehiculeList = $myManager_Vehicule->getAll();

            break;
        case "cam":
            $vehiculeList = $myManager_Vehicule->getByType("camion");


            break;
        case "voit":
            $vehiculeList = $myManager_Vehicule->getByType("voiture");

            break;
    }
} else {
    $vehiculeList = $myManager_Vehicule->getAll();
}