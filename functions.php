<?php
function debug($variable){
    echo '<pre>'.print_r($variable, true).'</pre>';
}

function str_random($length){
    //Soit une nouvelle variable qui contiendra tout les caractères qu'on prendra en compte
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    //On va la répéter 60 fois, car on veut pouvoir avoir plusieurs fois le meme caractère
    //1: str_repeat pour répéter l'alphabet 60fois, 2: str_shuffl pour mélanger tout les char, puis
    //3: substr (ce truc) de 0 à taille pour n'avoir q'une clé de 60 charactères
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}