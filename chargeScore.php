<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$score=$mm->loadScore($_GET["pseudo"]);
if($score!=null){
$accepte=$score["accepte"];
$refuse=$score["refuse"];
$score["score"]+=$accepte;
$score["nb_partie"]+=$accepte+$refuse;
$mm->saveScoreMAJ($score);
echo json_encode($score);
}else{
$mm->createScore($_GET["pseudo"]);
$score=$mm->loadScore($_GET["pseudo"]);
echo json_encode($score);
}