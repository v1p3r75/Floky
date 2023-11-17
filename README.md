# Floky

**Floky** est un framework MVC (Modèle-Vue-Contrôleur) pour le développement d'applications web en PHP. Il offre une structure organisée pour votre code, des fonctionnalités puissantes et une flexibilité pour créer des applications web robustes et évolutives.

## Caractéristiques Principales

- **Architecture MVC** : Organisez votre code de manière propre et modulaire.
- **Routage Puissant** : Gérez les URL de manière flexible pour diriger les demandes vers les contrôleurs appropriés.
- **Gestion de Base de Données** : Facilitez l'interaction avec les bases de données grâce à Nexa (un ORM nouvelle génération flexible puissant et facile à prendre en main).
- **Sécurité** : Intégrez des mécanismes de sécurité pour protéger votre application contre les vulnérabilités courantes.
- **Vue Flexible** : Utilisez le moteur de template [BladeOne](https://github.com/EFTEC/BladeOne/) pour concevoir des vues riches et dynamiques.
- **Conteneur de Dépendances** : Utilisez un conteneur de dépendances pour gérer les services de votre application de manière efficace.
- **Tests Plus Élégants** : Profitez de [Pest](https://pestphp.com/), un framework de test élégant pour PHP, pour écrire des tests propres, lisibles et expressifs pour votre application.
- **Composants Réutilisables** : Profitez de bibliothèques et d'outils pour accélérer le développement.
- **Documentation Complète** : Un guide détaillé pour vous aider à démarrer rapidement.

## Pourquoi Floky

Floky a été conçu pour répondre à un besoin fondamental : permettre aux développeurs de démarrer rapidement un projet sans devoir passer des semaines à comprendre le fonctionnement comme de nombreux  outils. Nous comprenons que parfois, vous avez simplement besoin d'un outil léger et efficace pour donner vie à vos idées sans être submergé par une multitude de fonctionnalités inutiles.

L'idée derrière Floky n'est pas de **réinventer la roue**, mais de fournir un ensemble d'outils bien conçus et faciles à utiliser pour les projets de taille plus modeste. Nous avons cherché à simplifier le développement en évitant la complexité inutile, tout en offrant une flexibilité pour créer des applications web de qualité.


Voici pourquoi Floky peut être le choix idéal pour votre prochain projet :

- **Démarrage Rapide**

Avec Floky, vous pouvez rapidement mettre en place la structure de votre application et commencer à écrire du code fonctionnel en un rien de temps. Notre architecture simple et modulaire vous permet de vous concentrer sur la logique de votre application sans avoir à vous soucier de configurations complexes.

- **Moins de Courbe d'Apprentissage**

Contrairement à de nombreux frameworks massifs, Floky est conçu pour être intuitif. Vous n'avez pas besoin de passer des heures à comprendre la documentation ou à apprendre des concepts abstraits. Se familiariser avec des notions telles que les routes, les middlewares et autres concepts clés de Floky est un processus rapide et transparent.

- **Léger et Adaptable**

Floky est un framework léger qui ne surcharge pas votre projet avec des fonctionnalités inutiles. Il s'adapte parfaitement aux projets de taille modeste, en vous fournissant les outils essentiels pour créer des applications web efficaces.

Que votre projet soit un petit site web, une application web simple, ou un prototype, Floky peut vous aider à avancer rapidement sans sacrifier la qualité. Il offre la flexibilité dont vous avez besoin pour vous concentrer sur ce qui compte vraiment : donner vie à votre projet.

Alors, pourquoi attendre ? Essayez Floky aujourd'hui et commencez à développer vos idées sans tracas ni complications inutiles.

## Installation

- Assurez-vous d'avoir Composer installé sur votre système. Si ce n'est pas le cas, vous pouvez le télécharger et l'installer à partir du site officiel de [Composer](https://getcomposer.org/download/).

- Exécutez la commande Composer pour créer et installer les dépendences de l'application :

    ```bash
    composer create-project v1p3r75/floky --stability=dev    
    ```

Vous aurez maintenant la version la plus récente de votre framework et toutes les dépendances correctement installées.


## Configuration

La configuration de votre application se trouve dans le fichier `.env` (Renommer le fichier `.env.example` en `.env`). Vous pouvez y définir les paramètres de base de données, les clés secrètes, et d'autres configurations spécifiques à votre application.

## Structure du Projet

- `public/` : Le point d'entrée de votre application, les fichiers accessibles depuis le navigateur.
- `src/` : Le répertoire principal de votre code source.
    - `app/` : Contient les contrôleurs, les modèles, les middlewares, les services et d'autres composants de votre application.
    - `config/` : Contient les fichiers de configuration de votre application.
    - `routes/` : Les fichiers de définition des routes de votre application.
    - `storage/` : Les fichiers générés par l'application, tels que les journaux, les sessions, etc.
    - `views/` : Contient les fichiers de templates pour la génération de vues.
    - ... (d'autres répertoires et fichiers spécifiques à votre projet)
- `test/` : Contient les fichiers de test pour l'application.

## Comment Lancer l'Application

Une fois que vous avez installé Floky, vous êtes prêt à lancer votre application. Suivez ces étapes simples pour démarrer votre projet :

### Utiliser le serveur de PHP

1. **Configuration de l'Environnement** : Avant de lancer votre application, assurez-vous d'avoir configuré correctement l'environnement. Assurez-vous que les paramètres, tels que la connexion à la base de données et d'autres options spécifiques à votre projet, sont correctement définis.

2. **Migrations de la Base de Données** : Si votre application utilise une base de données, assurez-vous d'effectuer les migrations nécessaires pour créer les tables et les schémas de base de données. Vous pouvez utiliser des commandes spécifiques fournies par le framework pour effectuer ces migrations.

3. **Création de Routes** : Configurez vos routes dans le répertoire `src/routes/`. C'est ici que vous spécifiez comment les URL doivent être gérées par votre application. Vous pouvez définir des contrôleurs, des actions et des paramètres pour chaque route.

4. **Création de Contrôleurs et de Vues** : Développez les contrôleurs et les vues pour gérer les différentes parties de votre application. Les contrôleurs définissent la logique de gestion des demandes, tandis que les vues définissent la présentation des données.

5. **Lancement du Serveur de Développement** : Utilisez la commande spécifique pour lancer le serveur de développement intégré de votre framework. Cela vous permettra de tester votre application localement.

   ```bash
   php -S localhost:9000 server.php
    ```	
    
    Cette commande lancera le serveur de développement sur http://localhost:9000, et vous pourrez accéder à votre application à partir de votre navigateur.

### Utiliser un Serveur Web Local

- Lancement du Serveur Web Local : Démarrez votre serveur web local (par exemple, Apache ou Nginx) et configurez-le pour qu'il serve votre application à partir du répertoire public/ de votre projet.

- Accès à l'Application : Ouvrez votre navigateur web et accédez à l'URL appropriée pour votre serveur web local. Vous pourrez voir votre application en cours d'exécution.

## Documentation

Consultez notre [documentation complète](https://github.com/v1p3r75/Floky) pour en savoir plus sur la façon d'utiliser **Floky**.

## Contributeurs

Le développement de **Floky** est actuellement en cours, et nous accueillons avec plaisir toute contribution de la communauté. Si vous souhaitez contribuer, veuillez consulter notre [guide de contribution](CONTRIBUTING.md).

L'équipe de développement principal comprend actuellement les contributeurs suivants :

- [Fortunatus KIDJE (v1p3r75)](https://github.com/v1p3r75) - Fondateur et développeur principal
- [Kabirou ALASSANE (BlakvGhost)](https://github.com/BlakvGhost) - Développeur principal

Nous sommes enthousiastes à l'idée de développer ce projet et d'ajouter de nouvelles fonctionnalités pour répondre aux besoins de la communauté des développeurs PHP. Rejoignez-nous dans cette aventure et contribuez à faire de **Floky** un outil encore plus léger et puissant pour le développement d'applications web en PHP.

### Comment soumettre sa contribution
- Fork le dépôt.

- Clonez votre fork :

    ```bash
    git clone https://github.com/v1p3r/floky-core.git
    ```

    (Pour travailler sur le core) ou

    ```bash
        git clone https://github.com/v1p3r/floky.git
    ```
    (Pour travailler sur l'application)

- Créez une nouvelle branche :
    ```bash
    git checkout -b fonctionnalite/nouvelle-fonctionnalite
    ```

- Effectuez vos modifications et commitez-les :
    ```bash
    git commit -am 'Ajouter une nouvelle fonctionnalité'
    ```

- Pushez vers la branche :
    ```bash
    git push origin fonctionnalite/nouvelle-fonctionnalite
    ```

- Soumettez une pull request.

#### NB

- Utiliser des Branches Descriptives : Lorsque vous travaillez sur de nouvelles fonctionnalités ou correctifs, créez des branches descriptives (par exemple, feature/nouvelle-fonctionnalite ou fix/correction-bug). Cela facilite la gestion des contributions multiples.

- Décrire Clairement les Pull Requests : Fournissez des descriptions claires et concises pour chaque pull request. Expliquez le problème résolu ou la nouvelle fonctionnalité ajoutée. Assurez-vous que chaque pull request est liée à une issue si applicable.

- Utiliser des Conventions de Message de Commit Claires : Adoptez des conventions claires pour les messages de commit. Par exemple, utilisez le format <type>(<scope>): <message>, où <type> peut être feat pour une nouvelle fonctionnalité, fix pour une correction de bug, etc.


Nous apprécions vos contributions !

## Licence

Ce projet est sous licence [MIT](https://en.wikipedia.org/wiki/MIT_License) - pour plus de détails, veuillez consulter le fichier [LICENCE](LICENCE).