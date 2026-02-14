# Système de Messagerie PHP/SQL (Projet Académique)

Ce projet est une application de messagerie fonctionnelle développée dans le cadre de mon **BTS SIO (Services Informatiques aux Organisations)**. L'objectif principal était de maîtriser les fondamentaux du développement back-end, la gestion des sessions et la manipulation de bases de données relationnelles.

## 🚀 Fonctionnalités
* **Authentification Utilisateur :** Système complet d'inscription et de connexion utilisant les sessions PHP.
* **Messagerie :** Échange de messages en temps réel (canaux "Général" et messages privés).
* **Gestion des Données :** Stockage structuré de l'historique des conversations dans une base MySQL.
* **Traçabilité des Données (Trigger) :** Implémentation d'un Trigger SQL (`BEFORE DELETE`) pour archiver automatiquement les messages dans une table d'audit lors d'une suppression par l'utilisateur.
* **Gestion des messages :** Possibilité pour l'utilisateur de supprimer ses propres messages, déclenchant le processus d'archivage automatique côté serveur.

## 🛠️ Technologies utilisées
* **Frontend :** HTML5, CSS3.
* **Back-end :** PHP.
* **Base de données :** MySQL (MariaDB).

## 📁 Structure de la Base de Données
Le dépôt inclut un fichier `database_schema.sql` comprenant :
* **Table `users` :** Stocke les identifiants et profils utilisateurs.
* **Table `messages` :** Contient l'historique complet des échanges.
* **Table `archives_messages` :** Journal d'audit automatisé pour la conservation des contenus supprimés.



## ⚙️ Installation et Configuration
1. **Clonage :** Cloner le dépôt sur votre serveur local (WAMP, XAMPP ou Laragon).
2. **Base de données :** Importer le fichier `database_schema.sql` dans votre serveur MySQL via phpMyAdmin.
3. **Configuration :** Vérifier que les paramètres de connexion à la base de données dans les fichiers PHP correspondent à votre environnement local (`mysqli_connect`).
4. **Lancement :** Accéder à l'application via votre navigateur à l'adresse `localhost` en ouvrant la page `connexion.php`.

---
*Projet réalisé à des fins pédagogiques - BTS SIO SLAM*
