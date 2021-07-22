<div class="selectiveFilter p-3 bg-warning">
    <h3 class="text-center text-dark">filtres</h3>
    <div class="row ">
        <form action="#" method="post">
            <button class="col btn btn-secondary" name="selective" type="submit" value="all">
                tout voirs
            </button>
            <button class="col  btn btn-secondary" name="selective" type="submit" value="voit">
                que les voitures
            </button>
            <button class="col btn btn-secondary" name="selective" type="submit" value="cam">
                que les camions
            </button>
        </form>
    </div>
</div>
<div class="accordion accordion-flush" id="accordionVehic">
    <?php
    $listCount = 1;
    foreach ($vehiculeList as $ind => $vehic) {
    ?>


    <div class="accordion-item card text-dark">
        <h4 class="accordion-header card-header" id="heading<?php echo $listCount ?>">

            <button class="accordion-button collapsed 
            <?php
            if (isset($vehiculeToEdit) && ($vehiculeToEdit->getId() == $vehic->getId())) {
                echo "editing";
            }
            ?>
            " type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $listCount ?>"
                aria-expanded="false" aria-controls="collapse<?php echo $listCount ?>">
                <h4>
                    <?php echo ($vehic->getMarque() . " // " . $vehic->getModele()); ?>
                </h4>
            </button>
        </h4>
        <div id="collapse<?php echo $listCount ?>" class="accordion-collapse collapse "
            aria-labelledby="heading<?php echo $listCount ?>" data-bs-parent="#accorddionVehic">
            <div class="accordion-body card body">
                <form action="#" method="post" class="text-end">
                    <button class="btn btn-warning" name="edit" type="submit" value="prepareEdit">
                        <input name="id" hidden value="<?php echo $vehic->getId(); ?>">


                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </button>
                    <button class="btn btn-danger text-end" name="delete" type="submit" value="delete">
                        <input name="id" hidden value="<?php echo ($vehic->getId()); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                        </svg>
                    </button>
                </form>
                <div class="row">
                    <div class="col-md-4">
                        <h6>Puissance Fiscale</h6>
                        <p><?php echo $vehic->getPuissanceFiscale(); ?></p>
                    </div>
                    <div class="col-md-4">

                        <h6>vitesse</h6>
                        <p><?php echo $vehic->getVitesse(); ?></p>
                    </div>
                    <div class="col-md-4">

                        <h6>Poids</h6>
                        <p><?php echo $vehic->getPoids(); ?></p>
                    </div>
                    <div class="col-md-4">

                        <h6>type</h6>

                        <p><?php echo $vehic->getVehicType(); ?></p>
                        <?php
                            if ($vehic->getVehicType() == "voiture") {
                            ?>
                    </div>
                    <div class="col-md-4">

                        <h6>taille du coffre</h6>
                        <p><?php echo $vehic->getTailleCoffre(); ?></p>
                    </div>
                    <div class="col-md-4">

                        <h6>nombre de passagers</h6>
                        <p><?php echo $vehic->getNbrPassagers(); ?></p>
                    </div>

                    <?php
                            }
                    ?>
                    <?php
                    if ($vehic->getVehicType() == "camion") {
                    ?>
                </div>
                <div class="col-md-4">

                    <h6>cargaison</h6>
                    <p><?php echo $vehic->getCargaison(); ?></p>
                </div>
                <div class="col-md-4">

                    <h6>capacité de stockage</h6>
                    <p><?php echo $vehic->getCapaStockage(); ?></p>
                </div>

                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<?php
        $listCount++;
    }
?>


</div>