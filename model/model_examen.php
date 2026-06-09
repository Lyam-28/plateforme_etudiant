<?php

// Model examen
// Pareil que pour les étudiants, juste les requêtes SQL pour les examens

// Tous les examens avec le nom de la filière
function getAllExamens($bdd)
{
    $req = $bdd->query("
        SELECT ex.*, f.nom_filiere
        FROM examen ex
        JOIN filiere f ON ex.id_filiere = f.id_filiere
    ");
    return $req->fetchAll();
}

// Ajoute un examen
function addExamen($bdd, $nom, $date, $id_filiere)
{
    $req = $bdd->prepare("INSERT INTO examen (nom_examen, date, id_filiere) VALUES (:nom, :date, :id_filiere)");
    $req->execute([':nom' => $nom, ':date' => $date, ':id_filiere' => $id_filiere]);
}

// Modifie un examen existant
function updateExamen($bdd, $id, $nom, $date, $id_filiere)
{
    $req = $bdd->prepare("UPDATE examen SET nom_examen = :nom, date = :date, id_filiere = :id_filiere WHERE id_examen = :id");
    $req->execute([':nom' => $nom, ':date' => $date, ':id_filiere' => $id_filiere, ':id' => $id]);
}

// Récupère un examen par id
function getExamenById($bdd, $id)
{
    $req = $bdd->prepare("SELECT * FROM examen WHERE id_examen = :id");
    $req->execute([':id' => $id]);
    return $req->fetch();
}

// Supprime un examen
function deleteExamen($bdd, $id)
{
    $req = $bdd->prepare("DELETE FROM examen WHERE id_examen = :id");
    $req->execute([':id' => $id]);
}
