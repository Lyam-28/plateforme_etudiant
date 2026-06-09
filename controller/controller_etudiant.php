<?php

/** @var PDO $bdd */

// Controller étudiant
// En gros c'est le chef : il reçoit la demande, appelle le model, et affiche la bonne view

require_once 'model/model_etudiant.php';
require_once 'model/model_filiere.php';

// On regarde ce qu'on veut faire dans l'URL (ex: ?action=ajouter)
// Si y'a rien on affiche la liste par défaut
$action = $_GET['action'] ?? 'afficher';

// --- AFFICHER LA LISTE ---
if ($action == 'afficher') {
    $etudiants = getAllEtudiants($bdd); // on va chercher les données en BDD
    require 'view/etudiant/afficher.php'; // puis on affiche la page
}

// --- AJOUTER UN ÉTUDIANT ---
if ($action == 'ajouter') {
    $filieres = getAllFilieres($bdd); // besoin de la liste des filières pour le select
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // le formulaire a été envoyé, on enregistre et on retourne à la liste
        addEtudiant($bdd, $_POST['nom_etudiant'], $_POST['prenom_etudiant'], $_POST['id_filiere']);
        header('Location: index.php?page=etudiant');
        exit;
    }
    require 'view/etudiant/ajouter.php'; // sinon on affiche juste le formulaire vide
}

// --- MODIFIER UN ÉTUDIANT ---
if ($action == 'editer') {
    $etudiant = getEtudiantById($bdd, $_GET['id']); // on récupère l'étudiant à modifier
    $filieres = getAllFilieres($bdd);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        updateEtudiant($bdd, $_GET['id'], $_POST['nom_etudiant'], $_POST['prenom_etudiant'], $_POST['id_filiere']);
        header('Location: index.php?page=etudiant');
        exit;
    }
    require 'view/etudiant/editer.php';
}

// --- SUPPRIMER ---
// Pas de page de confirmation, on supprime direct et c'est tout
if ($action == 'supprimer') {
    deleteEtudiant($bdd, $_GET['id']);
    header('Location: index.php?page=etudiant');
    exit;
}
