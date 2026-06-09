<?php

/** @var PDO $bdd */

// Controller filière
// Gère tout ce qui concerne les filières (liste, ajout, modif, suppression)

require_once 'model/model_filiere.php';

$action = $_GET['action'] ?? 'afficher';

// --- AFFICHER LA LISTE ---
if ($action == 'afficher') {
    $filieres = getAllFilieres($bdd);
    require 'view/filiere/afficher.php';
}

// --- AJOUTER UNE FILIÈRE ---
if ($action == 'ajouter') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        addFiliere($bdd, $_POST['nom_filiere']);
        header('Location: ?page=filiere');
        exit;
    }
    require 'view/filiere/ajouter.php';
}

// --- MODIFIER UNE FILIÈRE ---
if ($action == 'editer') {
    $filiere = getFiliereById($bdd, $_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        updateFiliere($bdd, $_GET['id'], $_POST['nom_filiere']);
        header('Location: ?page=filiere');
        exit;
    }
    require 'view/filiere/editer.php';
}

// --- SUPPRIMER ---
if ($action == 'supprimer') {
    deleteFiliere($bdd, $_GET['id']);
    header('Location: ?page=filiere');
    exit;
}
