<?php
$envPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';

if (!file_exists($envPath)) {
    die('Fichier .env introuvable.');
}

$env = parse_ini_file($envPath);

$db_hote = $env['db_hote'] ?? 'localhost';
$db_user = $env['db_user'] ?? 'root';
$db_mdp = $env['db_mdp'] ?? '';
$db_nom = $env['db_nom'] ?? '';


$bdd = new PDO(
    "mysql:host=$db_hote;dbname=$db_nom;charset=utf8",
    $db_user,
    $db_mdp,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
