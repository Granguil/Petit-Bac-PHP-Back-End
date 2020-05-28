<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$cat=$_GET["categorie"];
$mot=$_GET["mot"];
$cond=$mm->getMot($cat,$mot);
echo $cond;
