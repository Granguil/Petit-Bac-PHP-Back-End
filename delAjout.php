<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$cat=$_POST["categorie"];
$mot=$_POST["mot"];
$pseudo=$_POST["pseudo"];
$statut=$_POST["statut"];
$mm->delAjout($cat,$mot,$pseudo);
if($statut=="accepte"){
    $mm->accepte($pseudo);
}else if($statut=="refuse"){
    $mm->refuse($pseudo);
}