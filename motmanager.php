<?php
class motmanager{
    private $_db;

    public function __construct($db){
        //Attribution de l'objet PDO à l'attribut $_db
        $this->setDB($db);
        
    }

    public function saveScoreMAJ($score){
        $save=$this->_db->prepare("UPDATE score SET accepte=0, refuse=0, score=?, nb_partie=? WHERE pseudo=?");
        $save->execute(array($score["score"],$score["nb_partie"],$score["pseudo"]));
    }

    public function accepte($pseudo){
        $save=$this->_db->prepare("UPDATE score SET accepte=accepte+1, en_attente=en_attente-1 WHERE pseudo=?");
        $save->execute(array($pseudo));
    }

    public function refuse($pseudo){
        $save=$this->_db->prepare("UPDATE score SET refuse=refuse+1, en_attente=en_attente-1 WHERE pseudo=?");
        $save->execute(array($pseudo));
    }

    public function loadScore($pseudo){
        $get=$this->_db->prepare("SELECT * FROM score WHERE pseudo=?");
        $get->execute(array($pseudo));
        $donnees=$get->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    public function createScore($pseudo){
        $add=$this->_db->prepare("INSERT INTO score(pseudo) VALUES (?)");
        $add->execute(array($pseudo));
    }
    public function saveScore($pseudo,$score,$nbp,$ea){
        $save=$this->_db->prepare("UPDATE score SET score=?, nb_partie=?, en_attente=? WHERE pseudo=?");
        $save->execute(array($score,$nbp,$ea,$pseudo));
    }

    public function classement(){
        $cl=$this->_db->prepare("SELECT * FROM score ORDER BY (score/nb_partie*100) DESC,nb_partie DESC");
        $cl->execute();
        return $cl;
    }

    public function getMot($cat,$mot){
        $get=$this->_db->prepare("SELECT * FROM mot where categorie=? AND mot=?");
        $get->execute(array($cat,$mot));
        $cond=$get->fetch(PDO::FETCH_ASSOC);
        if(!$cond){
            return False;
        }else{
            return True;
        }
    }

    public function addMot($cat,$mot){
        $add=$this->_db->prepare("INSERT INTO mot(categorie,mot) VALUES (?,?)");
        $add->execute(array($cat,$mot));
    }

    public function listeMot(){
        $get=$this->_db->prepare("SELECT * FROM mot ORDER BY categorie ASC,mot ASC");
        $get->execute();
        $mots=[];
        while($donnees=$get->fetch(PDO::FETCH_ASSOC)){
            $mots[]=$donnees;
        }
        return $mots;
    }

    public function getAjouts(){
        $get=$this->_db->prepare("SELECT * FROM ajout ORDER BY categorie ASC");
        $get->execute();
        $mots=[];
        while($donnees=$get->fetch(PDO::FETCH_ASSOC)){
            $mots[]=$donnees;
        }
        return $mots;
    }

    public function addAjout($cat,$mot,$pseudo){
        $add=$this->_db->prepare("INSERT INTO ajout(categorie,mot,pseudo) VALUES (?,?,?)");
        $add->execute(array($cat,$mot,$pseudo));
    }

    public function delAjout($cat,$mot,$pseudo){
        $del=$this->_db->prepare("DELETE FROM ajout WHERE categorie=? AND mot=? AND pseudo=?");
        $del->execute(array($cat,$mot,$pseudo));
    }

    private function setDB(PDO $db){
        $this->_db=$db;
    }
}