<?php
//import connexion
require('managers/connectDataBase.php'); //pdo
require('class/ManagerParameters.php');

//import class
require('managers/VehiculeManager.php');
require('class/Vehicule.php'); //abstract mère
require('class/Voiture.php');
require('class/Camion.php');


$myManager_Vehicule = new VehiculeManager($pdo);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP POO</title>
</head>

<body class="text-light bg-dark">


    <?php
    require_once("managers/managerActions.php")

    ?>



    <header class="bg-warning mb-5 text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">

            <h1>
                <a href="index.php">cours sur le php orienté objet PT Vehicules</a>
            </h1>
        </div>
    </header>



    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-6 py-5 bg-secondary">
                <?php
                // formulaire pour editer/ajouter un véhicule
                include('parts/addForm.php')
                ?>

            </div>

            <div class="col-md-6 py-5 bg-secondary">
                <h2 class="text-center">liste des véhicules</h2>

                <?php
                // list des véhicules
                include('parts/vehiculeList.php');
                ?>
            </div>
        </div>
    </div>


    <footer class="bg-warning mt-5 text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021:
            <a class="text-dark" href="">Made_By_Rwan</a>
        </div>
    </footer>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js" type="module"></script>

</body>

</html>