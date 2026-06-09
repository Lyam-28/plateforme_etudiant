<?php

/** @var array $filieres */


// $filieres vient du controller pour remplir le menu déroulant
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php" class="brand">Plateforme Etudiants</a>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?page=etudiant" class="active">Étudiants</a>
            <a href="index.php?page=filiere">Filières</a>
            <a href="index.php?page=examen">Examens</a>
        </nav>
    </div>

    <div class="contenu">
        <h1 class="titre">Ajouter un étudiant</h1>

        <div class="formulaire">
            <!-- method POST = quand on clique sur Ajouter ça renvoie au controller -->
            <form method="POST">
                <div class="champ">
                    <label>Nom</label>
                    <input type="text" name="nom_etudiant" placeholder="Ex: Jotaro" required>
                </div>
                <div class="champ">
                    <label>Prénom</label>
                    <input type="text" name="prenom_etudiant" placeholder="Ex: Kujo" required>
                </div>
                <div class="champ">
                    <label>Filière</label>
                    <select name="id_filiere" required>
                        <option value="">-- Choisir une filière --</option>
                        <?php foreach ($filieres as $f) : ?>
                            <option value="<?= $f['id_filiere'] ?>"><?= htmlspecialchars($f['nom_filiere']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bouton mainbut">Ajouter</button>
                <a href="index.php?page=etudiant" class="bouton retour">Retour</a>
            </form>
        </div>
    </div>

</body>

</html>