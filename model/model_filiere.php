<?php

// Model filière
// Les filières c'est simple, y'a juste un nom en BDD

// Récupère toutes les filières (utilisé aussi pour les listes déroulantes des formulaires)
function getAllFilieres($bdd)
{
    $req = $bdd->query("SELECT * FROM filiere");
    return $req->fetchAll();
}

// Une filière par son id
function getFiliereById($bdd, $id)
{
    $req = $bdd->prepare("SELECT * FROM filiere WHERE id_filiere = :id");
    $req->execute([':id' => $id]);
    return $req->fetch();
}

// Ajoute une filière
function addFiliere($bdd, $nom)
{
    $req = $bdd->prepare("INSERT INTO filiere (nom_filiere) VALUES (:nom)");
    $req->execute([':nom' => $nom]);
}

// Change le nom d'une filière
function updateFiliere($bdd, $id, $nom)
{
    $req = $bdd->prepare("UPDATE filiere SET nom_filiere = :nom WHERE id_filiere = :id");
    $req->execute([':nom' => $nom, ':id' => $id]);
}

// Supprime une filière
function deleteFiliere($bdd, $id)
{
    $req = $bdd->prepare("DELETE FROM filiere WHERE id_filiere = :id");
    $req->execute([':id' => $id]);
}
