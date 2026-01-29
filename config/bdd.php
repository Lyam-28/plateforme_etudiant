<?php
//connexion à la bdd Etudiant
$connexion = mysqli_connect("localhost", "root", "", "etudiant");
if (!$connexion) {
    echo "Erreur de connexion à la base de données.";
}
