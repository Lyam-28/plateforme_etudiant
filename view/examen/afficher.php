<?php

/** @var array $examens */


// $examens est préparé par le controller avant d'arriver ici
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Examens</title>
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
        <h1 class="titre">Examens</h1>

        <div class="entete-tableau">
            <h2>Liste des examens</h2>
            <a href="index.php?page=examen&action=ajouter" class="bouton mainbut">+ Ajouter un examen</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de l'examen</th>
                    <th>Date</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($examens as $ex) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($ex['nom_examen']) ?></td>
                        <!-- strtotime + date pour afficher la date en format français -->
                        <td><?= date('d/m/Y H:i', strtotime($ex['date'])) ?></td>
                        <td><span class="badge badge-bleu"><?= htmlspecialchars($ex['nom_filiere']) ?></span></td>
                        <td>
                            <a href="index.php?page=examen&action=editer&id=<?= $ex['id_examen'] ?>" class="bouton editbut">Modifier</a>
                            <a href="index.php?page=examen&action=supprimer&id=<?= $ex['id_examen'] ?>" class="bouton suppbut">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>