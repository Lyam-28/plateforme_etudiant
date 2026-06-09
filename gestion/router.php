<?php
require_once 'config/bdd.php';

$page = $_GET['page'] ?? 'accueil';

if ($page == 'accueil') {
    require 'view/dashboard.php';
}

if ($page == 'filiere') {
    require 'controller/controller_filiere.php';
}

if ($page == 'etudiant') {
    require 'controller/controller_etudiant.php';
}

if ($page == 'examen') {
    require 'controller/controller_examen.php';
}
