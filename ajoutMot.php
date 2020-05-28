<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$cat=$_POST["categorie"];
$mot=$_POST["mot"];
$mm->addMot($cat,$mot);