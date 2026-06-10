# Plateforme de gestion étudiants

Un site web fait en PHP/MySQL pour gérer des étudiants, leurs filières et leurs examens.
Fait avec Wampserver en local.

## Ce qu'on peut faire

- Ajouter, modifier, supprimer et afficher des étudiants, filières ou examens
- Voir un tableau de bord avec le nombre total d'étudiants, filières et examens actuels

## Technologies

- PHP pour toute la logique
- MySQL pour la base de données
- HTML/CSS pour l'affichage
- WampServer pour faire tourneren local

## Base de données

3 tables : filiere, etudiant, examen

Un étudiant appartient à une filière, un examen aussi.
Si on supprime une filière, tout ce qui est lié est supprimé automatiquement.

## Lancer le projet
- Cloner le projet
- Avoir installé Wampserver
- Importer la base de données dans phpMyAdmin
- Aller sur `localhost/nom_du_dossier`
