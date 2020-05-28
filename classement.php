<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$cl=$mm->classement();
$cla=[];
while($donnee=$cl->fetch(PDO::FETCH_ASSOC)){
$cla[]=$donnee;
}
echo json_encode($cla);