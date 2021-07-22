<?php
if (isset($vehiculeToEdit)) {
    echo " <h2 class='text-center'> formulaire d'édition de véhicule</h2>";
} else {
    echo " <h2 class='text-center'> formulaire de création de véhicule</h2>";
}
?>

<form method="post" action="#" class="
<?php if (isset($vehiculeToEdit)) {
    echo "editing";
} ?> p-1" enctype="multipart/form-data">


    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text text-end">immatriculation</span>
            </div>
            <input required type="text" id="id" name="id" class="form-control text-end" <?php if (isset($vehiculeToEdit)) {

                                                                                            echo ('value="' . $vehiculeToEdit->getId() . '"');
                                                                                        }
                                                                                        ?>>
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text text-end">marque</span>
            </div>
            <input required type="text" id="marque" name="marque" class="form-control text-end" <?php if (isset($vehiculeToEdit)) {

                                                                                                    echo ('value="' . $vehiculeToEdit->getMarque() . '"');
                                                                                                }
                                                                                                ?>>
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text text-end">modele</span>
            </div>
            <input required type="text" id="modele" name="modele" class="form-control text-end" <?php if (isset($vehiculeToEdit)) {

                                                                                                    echo ('value="' . $vehiculeToEdit->getModele() . '"');
                                                                                                }
                                                                                                ?>>
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text text-end">puissance fisc</span>
            </div>
            <input required type="number" id="puissanceFiscale" name="puissanceFiscale" class="form-control text-end"
                <?php if (isset($vehiculeToEdit)) {

                                                                                                                            echo ('value="' . $vehiculeToEdit->getPuissanceFiscale() . '"');
                                                                                                                        }
                                                                                                                        ?>>
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text text-end">poids</span>
            </div>
            <input <?php if (isset($vehiculeToEdit)) {

                        echo ('value="' . $vehiculeToEdit->getPoids() . '"');
                    }
                    ?> required type="number" id="poids" name="poids" class="form-control text-end">
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text ">vitesse</span>
            </div>
            <input <?php if (isset($vehiculeToEdit)) {

                        echo ('value="' . $vehiculeToEdit->getVitesse() . '"');
                    }
                    ?> required type="number" id="vitesse" name="vitesse" class="text-end form-control">
        </div>
    </div>
    <div class="row">
        <div class="input-group">
            <div class="input-group-prepend  ">
                <span class="input-group-text ">type</span>
            </div>
            <div class="form-check ms-5">
                <div>
                    <p>
                        <input <?php
                                if (!isset($vehiculeToEdit) or (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "voiture")) {
                                    echo "checked";
                                }
                                ?> class="form-check-input" value="voiture" type="radio" name="vehicType"
                            id="vehicTypeVoit">
                        <label class="form-check-label" for="vehicTypeVoit">
                            voiture
                        </label>
                    </p>
                    <p>
                        <input <?php
                                if (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "camion") {
                                    echo "checked ";
                                }
                                ?>class="form-check-input" value="camion" type="radio" name="vehicType"
                            id="vehicTypeCam">
                        <label class="form-check-label" for="vehicTypeCam">
                            camion
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="formSpeVoiture">
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend  ">
                    <span class="input-group-text ">nombre de place</span>
                </div>
                <input <?php if (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "voiture") {

                            echo ('value="' . $vehiculeToEdit->getNbrPassagers() . '"');
                        }
                        ?> type="number" id="nbrPassagers" name="nbrPassagers" class="text-end form-control">
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend  ">
                    <span class="input-group-text ">tailleCoffre</span>
                </div>
                <input <?php if (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "voiture") {

                            echo ('value="' . $vehiculeToEdit->getTailleCoffre() . '"');
                        }
                        ?>type="number" id="tailleCoffre" name="tailleCoffre" class="text-end form-control">
            </div>
        </div>
    </div>
    <div id="formSpeCamion">
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend  ">
                    <span class="input-group-text ">cargaison</span>
                </div>
                <input <?php if (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "camion") {

                            echo ('value="' . $vehiculeToEdit->getCargaison() . '"');
                        }
                        ?>type="number" id="cargaison" name="cargaison" class="text-end form-control">
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend  ">
                    <span class="input-group-text ">capacité stockage</span>
                </div>
                <input <?php if (isset($vehiculeToEdit) && $vehiculeToEdit->getVehicType() == "camion") {

                            echo ('value="' . $vehiculeToEdit->getCapaStockage() . '"');
                        }
                        ?> type="number" id="capaStockage" name="capaStockage" class="text-end form-control">
            </div>
        </div>
    </div>

    <?php
    if (isset($vehiculeToEdit)) {
    ?>
    <div class="row mt-5">
        <button class="btn btn-warning col-4 offset-1" id="edit" name="edit" type="submit" value="doEdit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
            editer ce vehicule
        </button>
        <a class="btn btn-danger col-4 offset-2" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
            annuler
        </a>
    </div>
    <?php
    } else {
    ?>
    <div class="row mt-5">
        <button class="btn btn-success col-6 offset-3" id="submitNew" name="submitNew" type="submit"
            value="newVehicule">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
            ajouter un vehicule
        </button>
    </div>
    <?php
    }
    ?>
</form>