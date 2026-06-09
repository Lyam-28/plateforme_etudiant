<?php

/** @var PDO $bdd */

// Controller examen
// Même principe que pour les étudiants : action -> model -> view

require_once 'model/model_examen.php';
require_once 'model/model_filiere.php';

$action = $_GET['action'] ?? 'afficher';

// --- AFFICHER LA LISTE ---
if ($action == 'afficher') {
    $examens = getAllExamens($bdd);
    require 'view/examen/afficher.php';
}

// --- AJOUTER UN EXAMEN ---
if ($action == 'ajouter') {
    $filieres = getAllFilieres($bdd);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        addExamen($bdd, $_POST['nom_examen'], $_POST['date'], $_POST['id_filiere']);
        header('Location: index.php?page=examen');
        exit;
    }
    require 'view/examen/ajouter.php';
}

// --- MODIFIER UN EXAMEN ---
if ($action == 'editer') {
    $examen = getExamenById($bdd, $_GET['id']);
    $filieres = getAllFilieres($bdd);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        updateExamen($bdd, $_GET['id'], $_POST['nom_examen'], $_POST['date'], $_POST['id_filiere']);
        header('Location: index.php?page=examen');
        exit;
    }
    require 'view/examen/editer.php';
}

// --- SUPPRIMER ---
if ($action == 'supprimer') {
    deleteExamen($bdd, $_GET['id']);
    header('Location: index.php?page=examen');
    exit;
}
