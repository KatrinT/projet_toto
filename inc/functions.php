<?php

//fonction pour verifier l'existante d'un email
//return true ou false
function emailExists($nomConnection) {
    //globaliser la varible pdo - elle fait le lien  dans mon fichier config
    global $pdo;
    $doublon = 'SELECT usr_email FROM users where usr_email = :nomConnection';
    $pdoStatement = $pdo->prepare($doublon);
    $pdoStatement->bindValue(':nomConnection', $nomConnection, PDO::PARAM_STR);
    $compteDoublon = $pdoStatement->execute();

    //compte le nombre de ma requete -si email existe deja
    $nombreDoublon = $pdoStatement -> rowCount();
    //echo $nombreDoublon;

    if ($nombreDoublon >= 1) {
        return true;
    } else{
        return false;
    }
}
