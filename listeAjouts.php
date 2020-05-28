<?php
require_once("Connexion.php");
require_once("motmanager.php");
$db=Connexion::connect();
$mm=new motmanager($db);
$aj=$mm->getAjouts();
echo json_encode($aj);