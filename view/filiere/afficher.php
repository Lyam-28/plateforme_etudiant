<?php

/** @var array $filieres */


// $filieres vient du controller
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Filieres</title>
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
        <h1 class="titre">Filieres</h1>

        <div class="entete-tableau">
            <h2>Liste des filieres</h2>
            <a href="index.php?page=filiere&action=ajouter" class="bouton mainbut">+ Ajouter une filiere</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de la filiere</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                foreach ($filieres as $f) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($f['nom_filiere']) ?></td>
                        <td>
                            <a href="index.php?page=filiere&action=editer&id=<?= $f['id_filiere'] ?>" class="bouton editbut">Modifier</a>
                            <a href="index.php?page=filiere&action=supprimer&id=<?= $f['id_filiere'] ?>" class="bouton suppbut">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>