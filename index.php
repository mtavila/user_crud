<?php 

require_once "Controllers/Templatecontroller.php";

require_once "Controllers/UserController.php";

require_once "Models/User.php";

$showTemplate = new templateController();
$showTemplate->mostrarPlantilla();