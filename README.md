# Plateforme de Cours en Ligne Youdemy

## Contexte du projet

La plateforme de cours en ligne **Youdemy** vise à révolutionner l’apprentissage en proposant un système interactif et personnalisé pour les étudiants et les enseignants. Le projet repose sur les concepts de **programmation orientée objet (OOP)** en **PHP natif**, afin d'assurer une architecture modulaire, claire et extensible.

## Fonctionnalités Requises

### Partie Front Office

#### Visiteur
- Accès au catalogue des cours avec pagination.
- Recherche de cours par mots-clés.
- Création d’un compte avec le choix du rôle (Étudiant ou Enseignant).

#### Étudiant
- Visualisation du catalogue des cours.
- Recherche et consultation des détails des cours (description, contenu, enseignant, etc.).
- Inscription à un cours après authentification.
- Accès à une section “Mes cours” regroupant les cours rejoints.

#### Enseignant
- Ajout de nouveaux cours avec des détails tels que :
  - Titre, description, contenu (vidéo ou document), tags, et catégorie.
- Gestion des cours :
  - Modification, suppression et consultation des inscriptions.
- Accès à une section “Statistiques” sur les cours :
  - Nombre d’étudiants inscrits, Nombre de cours, etc.

### Partie Back Office

#### Administrateur
- Validation des comptes enseignants.
- Gestion des utilisateurs :
  - Activation, suspension ou suppression.
- Gestion des contenus :
  - Cours, catégories et tags.
- Insertion en masse de tags pour gagner en efficacité.
- Accès à des statistiques globales :
  - Nombre total de cours, répartition par catégorie, le cours avec le plus d’étudiants, les Top 3 enseignants.

### Fonctionnalités Transversales
- Un cours peut contenir plusieurs tags (relation **many-to-many**).
- Application du concept de **polymorphisme** dans les méthodes suivantes : Ajouter cours et afficher cours.
- Système d’authentification et d’autorisation pour protéger les routes sensibles.
- **Contrôle d’accès** : Chaque utilisateur ne peut accéder qu’aux fonctionnalités correspondant à son rôle.

## Exigences Techniques

- Respect des principes **OOP** (encapsulation, héritage, polymorphisme).
- Base de données relationnelle avec gestion des relations (**one-to-many**, **many-to-many**).
- Utilisation des sessions PHP pour la gestion des utilisateurs connectés.
- Système de validation des données utilisateur pour garantir la sécurité.

## Liens Utiles

- **Repository GitHub** : [https://github.com/MhamedOuhanane/Cours-en-Ligne-Youdemy.git](https://github.com/MhamedOuhanane/Cours-en-Ligne-Youdemy.git)
- **Présentation du Projet** : [Vue d'ensemble sur Canva](https://www.canva.com/design/DAGc1Z5irGQ/iKpJJOncFj6u9PdE4NtH9Q/edit?utm_content=DAGc1Z5irGQ&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)
- **Planification du Projet** : [Suivi de projet sur Jira](https://mhamde.atlassian.net/jira/software/projects/PDCELY/boards/12?atlOrigin=eyJpIjoiMzBkMzAxMTI0ZjdmNDMwZTk5NWUxMTIwM2M2YzUzODYiLCJwIjoiaiJ9)