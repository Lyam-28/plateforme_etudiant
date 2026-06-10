<?php

/** @var array $etudiants */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Étudiants</title>
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
        <h1 class="titre">Étudiants</h1>

        <div class="entete-tableau">
            <h2>Liste des étudiants</h2>
            <a href="index.php?page=etudiant&action=ajouter" class="bouton mainbut">+ Ajouter un étudiant</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($etudiants as $e) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($e['nom_etudiant']) ?></td>
                        <td><?= htmlspecialchars($e['prenom_etudiant']) ?></td>
                        <td><span class="badge badge-bleu"><?= htmlspecialchars($e['nom_filiere']) ?></span></td>
                        <td>
                            <a href="index.php?page=etudiant&action=editer&id=<?= $e['id_etudiant'] ?>" class="bouton editbut">Modifier</a>
                            <a href="index.php?page=etudiant&action=supprimer&id=<?= $e['id_etudiant'] ?>" class="bouton suppbut">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>