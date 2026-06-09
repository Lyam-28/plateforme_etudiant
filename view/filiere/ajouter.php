<?php
// View formulaire ajout filière
// formulaire: juste un nom à saisir
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une filiere</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php" class="brand">Plateforme Etudiants</a>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?page=etudiant">Etudiants</a>
            <a href="index.php?page=filiere" class="active">Filieres</a>
            <a href="index.php?page=examen">Examens</a>
        </nav>
    </div>

    <div class="contenu">
        <h1 class="titre">Ajouter une filiere</h1>

        <div class="formulaire">
            <form method="POST">
                <div class="champ">
                    <label>Nom de la filiere</label>
                    <input type="text" name="nom_filiere" placeholder="Ex: BTS SIO SLAM" required>
                </div>
                <button type="submit" class="bouton mainbut">Ajouter</button>
                <a href="index.php?page=filiere" class="bouton retour">Retour</a>
            </form>
        </div>
    </div>

</body>

</html>