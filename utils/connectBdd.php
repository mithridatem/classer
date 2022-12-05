<?php
   //connexion à la base de données
   $bdd = new PDO('mysql:host=localhost;dbname=classer', 'root','',
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
