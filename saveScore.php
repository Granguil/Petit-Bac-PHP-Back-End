<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$pseudo=$_POST["pseudo"];
$score=$_POST["score"];
$nbp=$_POST["nb_partie"];
$ea=$_POST["en_attente"];
$mm->saveScore($pseudo,$score,$nbp,$ea);