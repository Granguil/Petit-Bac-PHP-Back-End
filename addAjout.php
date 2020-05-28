<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$mot=$_POST["mot"];
$cat=$_POST["categorie"];
$pseudo=$_POST["pseudo"];
$mm->addAjout($cat,$mot,$pseudo);