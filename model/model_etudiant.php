<?php

// Model étudiant
// Ici c'est que de la BDD, pas de HTML ni de logique d'affichage

// Récupère tous les étudiants + le nom de leur filière (JOIN parce qu'on en a besoin pour l'affichage)
function getAllEtudiants($bdd)
{
    $req = $bdd->query("
        SELECT e.*, f.nom_filiere
        FROM etudiant e
        JOIN filiere f ON e.id_filiere = f.id_filiere
    ");
    return $req->fetchAll();
}

// Cherche un étudiant par son id (utile pour la page modifier)
function getEtudiantById($bdd, $id)
{
    $req = $bdd->prepare("SELECT * FROM etudiant WHERE id_etudiant = :id");
    $req->execute([':id' => $id]);
    return $req->fetch();
}

// Insert un nouvel étudiant en base
function addEtudiant($bdd, $nom, $prenom, $id_filiere)
{
    $req = $bdd->prepare("INSERT INTO etudiant (nom_etudiant, prenom_etudiant, id_filiere) VALUES (:nom, :prenom, :id_filiere)");
    $req->execute([':nom' => $nom, ':prenom' => $prenom, ':id_filiere' => $id_filiere]);
}

// Met à jour les infos d'un étudiant qui existe déjà
function updateEtudiant($bdd, $id, $nom, $prenom, $id_filiere)
{
    $req = $bdd->prepare("UPDATE etudiant SET nom_etudiant = :nom, prenom_etudiant = :prenom, id_filiere = :id_filiere WHERE id_etudiant = :id");
    $req->execute([':nom' => $nom, ':prenom' => $prenom, ':id_filiere' => $id_filiere, ':id' => $id]);
}

// Supprime un étudiant (attention y'a pas de confirmation ici c'est le controller qui gère ça)
function deleteEtudiant($bdd, $id)
{
    $req = $bdd->prepare("DELETE FROM etudiant WHERE id_etudiant = :id");
    $req->execute([':id' => $id]);
}
