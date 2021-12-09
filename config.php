<?php


 try{
     $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', '');
 }
 catch(exception $e){
     die('erreur'.$e->getMessage());
 }


