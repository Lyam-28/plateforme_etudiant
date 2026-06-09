<?php

/** @var PDO $bdd */

// page d'accueil
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Plateforme Étudiants</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <!-- barre de nav en haut, pareille sur toutes les pages -->
    <div class="navbar">
        <a href="index.php" class="brand">Plateforme Etudiants</a>
        <nav>
            <a href="index.php" class="active">Accueil</a>
            <a href="index.php?page=etudiant">Étudiants</a>
            <a href="index.php?page=filiere">Filières</a>
            <a href="index.php?page=examen">Examens</a>
        </nav>
    </div>

    <div class="contenu">
        <h1 class="titre">Tableau de bord</h1>

        <div class="stats">
            <?php
            $nb_etudiants = $bdd->query("SELECT COUNT(*) FROM etudiant")->fetchColumn();
            $nb_filieres  = $bdd->query("SELECT COUNT(*) FROM filiere")->fetchColumn();
            $nb_examens   = $bdd->query("SELECT COUNT(*) FROM examen")->fetchColumn();
            ?>
            <div class="compteur-stats">
                <div class="nombre"><?= $nb_etudiants ?></div>
                <div class="libelle">Étudiants</div>
            </div>
            <div class="compteur-stats">
                <div class="nombre"><?= $nb_filieres ?></div>
                <div class="libelle">Filières</div>
            </div>
            <div class="compteur-stats">
                <div class="nombre"><?= $nb_examens ?></div>
                <div class="libelle">Examens</div>
            </div>
        </div>

        <div class="entete-tableau">
            <h2>Derniers étudiants inscrits</h2>
            <a href="index.php?page=etudiant&action=ajouter" class="bouton mainbut">+ Ajouter un étudiant</a>
        </div>

        <!-- on affiche que les 5 derniers, pas toute la liste -->
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
                <?php
                $etudiants = $bdd->query("
                SELECT e.*, f.nom_filiere
                FROM etudiant e
                JOIN filiere f ON e.id_filiere = f.id_filiere
                ORDER BY e.id_etudiant DESC
                LIMIT 5
            ")->fetchAll();
                foreach ($etudiants as $e) : ?>
                    <tr>
                        <td><?= $e['id_etudiant'] ?></td>
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