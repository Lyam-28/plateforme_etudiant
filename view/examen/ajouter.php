<?php

/** @var array $filieres */


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un examen</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php" class="brand">Plateforme Étudiants</a>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?page=etudiant">Étudiants</a>
            <a href="index.php?page=filiere">Filières</a>
            <a href="index.php?page=examen" class="active">Examens</a>
        </nav>
    </div>

    <div class="contenu">
        <h1 class="titre">Ajouter un examen</h1>

        <div class="formulaire">
            <form method="POST">
                <div class="champ">
                    <label>Nom de l'examen</label>
                    <input type="text" name="nom_examen" placeholder="Ex: Cybsersécurité des services informatiques" required>
                </div>
                <div class="champ">
                    <label>Date</label>
                    <!-- datetime-local = le navigateur affiche un calendrier + heure -->
                    <input type="datetime-local" name="date" required>
                </div>
                <div class="champ">
                    <label>Filière</label>
                    <select name="id_filiere" required>
                        <option value="">-- Choisir une filière --</option>
                        <?php foreach ($filieres as $f) : ?>
                            <option value="<?= $f['id_filiere'] ?>">
                                <?= htmlspecialchars($f['nom_filiere']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bouton mainbut">Ajouter</button>
                <a href="index.php?page=examen" class="bouton retour">Retour</a>
            </form>
        </div>
    </div>

</body>

</html>