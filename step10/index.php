<?php



use App\Autoloader;
use App\Controleur\Routeur;



require 'Autoloader.php';
Autoloader::register();



$routeur = new Routeur();
$routeur->routerRequete();








?>
