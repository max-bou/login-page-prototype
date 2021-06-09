<?php
// Récupérons d'abord les paramètres passés par l'url, id et token
$user_id = $_GET['id'];
$token = $_GET['token'];
// On fait la connexion à la bdd
require 'db.php';
// requète préparée sur l'utilisateur qui correspond à l'id demandé
$req = $pdo->prepare('SELECT confirmation_token FROM users WHERE id = ?');
// je l'éxecute en placant en paramètre le user_id
$req->execute([$user_id]);
// je récupère les informations avec un fetch
$user = $req->fetch();

// Vérificationd e la correspondance
if($user && $user->confirmation_token == $token){
    die('ok');
} else {
    die('nok');
}
?>