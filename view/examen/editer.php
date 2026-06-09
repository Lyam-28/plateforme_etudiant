<?php

/** @var array $examen */
/** @var array $filieres */

// Même logique que pour les étudiants : champs pré-remplis avec $examen
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un examen</title>
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
        <h1 class="titre">Modifier un examen</h1>

        <div class="formulaire">
            <form method="POST">
                <div class="champ">
                    <label>Nom de l'examen</label>
                    <input type="text" name="nom_examen" value="<?= htmlspecialchars($examen['nom_examen']) ?>" required>
                </div>
                <div class="champ">
                    <label>Date</label>
                    <!-- format Y-m-d\TH:i obligatoire pour datetime-local -->
                    <input type="datetime-local" name="date" value="<?= date('Y-m-d\TH:i', strtotime($examen['date'])) ?>" required>
                </div>
                <div class="champ">
                    <label>Filière</label>
                    <select name="id_filiere" required>
                        <option value="">-- Choisir une filière --</option>
                        <?php foreach ($filieres as $f) : ?>
                            <option value="<?= $f['id_filiere'] ?>" <?= $f['id_filiere'] == $examen['id_filiere'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($f['nom_filiere']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bouton mainbut">Enregistrer</button>
                <a href="index.php?page=examen" class="bouton retour">Retour</a>
            </form>
        </div>
    </div>

</body>

</html>