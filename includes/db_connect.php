<?php
$server = "localhost";
$dbname	= "blogv1";
$user	= "blogv1";
$pwd	= "wdv1";
// PDO
$dsn	= "mysql:dbname=".$dbname.";host:".$server.";charset=UTF8;" ;
$db		= new PDO($dsn,$user,$pwd);
// Définir les requêtes avec une récupération les valeurs en tableaux associatifs 
$db		->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

// détruire les autres variables
unset($server,$dbname,$user,$pwd,$dsn);