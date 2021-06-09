<?php
$pdo = new PDO('mysql:dbname=db_mapstime_protov3;host=localhost', 'root', '');
//Je veux acceder à la constante ATTR_ERRMOD qui est dans PDO, et on renvoit une exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Plutôt que de récupérer les erreures dans un tableau associatif, on les récupérera en tant qu'objet !
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);