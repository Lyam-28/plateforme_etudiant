<?php

/** @var array $etudiant */
/** @var array $filieres */


// $etudiant = les données actuelles, $filieres = pour le select
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php" class="brand">Plateforme Étudiants</a>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?page=etudiant" class="active">Étudiants</a>
            <a href="index.php?page=filiere">Filières</a>
            <a href="index.php?page=examen">Examens</a>
        </nav>
    </div>

    <div class="contenu">
        <h1 class="titre">Modifier un étudiant</h1>

        <div class="formulaire">
            <form method="POST">
                <div class="champ">
                    <label>Nom</label>
                    <!-- value = on pré-remplit avec ce qu'il y a déjà en base -->
                    <input type="text" name="nom_etudiant" value="<?= htmlspecialchars($etudiant['nom_etudiant']) ?>" required>
                </div>
                <div class="champ">
                    <label>Prénom</label>
                    <input type="text" name="prenom_etudiant" value="<?= htmlspecialchars($etudiant['prenom_etudiant']) ?>" required>
                </div>
                <div class="champ">
                    <label>Filière</label>
                    <select name="id_filiere" required>
                        <option value="">-- Choisir une filière --</option>
                        <?php foreach ($filieres as $f) : ?>
                            <!-- selected = on coche la filière actuelle de l'étudiant -->
                            <option value="<?= $f['id_filiere'] ?>" <?= $f['id_filiere'] == $etudiant['id_filiere'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($f['nom_filiere']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bouton mainbut">Enregistrer</button>
                <a href="index.php?page=etudiant" class="bouton retour">Retour</a>
            </form>
        </div>
    </div>

</body>

</html>