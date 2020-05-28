# Petit-Bac-PHP-Back-End : API mettant en relation le Petit-Bac-PHP-Front-End avec la base de données.

Utilisation : -Création de la base de données comme expliqué plus bas
              -Télécharger les fichiers .php
              -Utiliser un serveur (WampServer par exemple) ou un javabridge pour l'utiliser sur serveur Java (Tomcat 9 par exemple)
              -Selon l'emplacement des fichiers front-end et back-end, modifier les requêtes ajax du front-end pour qu'elles mènent aux fichiers Php
              
Création Base de Données : Utilisation de Mariadb (adaptable aux autres bases de données)
              -Création d'une base de données (create database bac)
              -Création des quatres tables :
                        -Categories : create table categorie(categorie varchar(30), primary key(categorie));
                              Pour faire la liste des catégories du jeu
                        -Mots : create table mot(id integer,mot varchar(100),categorie varchar(30),primary key(id),foreign key(categorie) references categorie(categorie));
                              Pour enregistrer les mots déjà trouvés
                        -Ajouts : create table ajout(id integer,mot varchar(100),categorie varchar(30),pseudo varchar(30),primary key(id),foreign key(categorie) references categorie(categorie));
                              Pour enregistrer les demandes d'ajout de mots des joueurs
                        -Score : create table score(id integer,pseudo varchar(30),score integer, nb_partie integer, en_attente, integer, accepte integer, refuse integer,primary key(id));
                              Pour enregistrer les scores et les variations de points avec les demandes d'ajouts de mots
