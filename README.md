# Exercice de développement Full-Stack: formulaire et CRUD

Cette codebase contient un micro site web avec un formulaire d'envoi de 
messages.

Le site est développé en HTML, CSS et PHP, sans aucun framework ou librairies
externes (à l'exception de [SimpleCSS](https://simplecss.org/), qui est utilisé
pour les styles de base).

Dans le cadre de l'exercice technique, nous vous demanderons de 
compléter quelques ajouts et modifications sur ce site web.

Si vous le désirez, vous pouvez jeter un coup d'oeil à la codebase afin de 
vous y familiariser, mais ce n'est qu'optionel: le temps alloué pour l'exercice
sera suffisant pour vous familiariser avec celle-ci de toute manière.


## Base de données

Une classe utilitaire `MessageRepository` a été mise en place afin de vous 
permettre d'intéragir avec une base de données.

Voici les méthodes principales qu'elle offre:

### `MessageRepository::persist(Message $message): Message` 
Vous permet d'enregistrer un message dans la base de données.

Si le message n'a pas déjà d'ID, un ID lui sera généré automatiquement et une 
entrée sera créée dans la base de données.

Si le message a déjà un ID, le message existant sera modifié dans la base de 
données.

### `MessageRepository::find(int $id): Message` 
Récupère et retourne un `Message` existant à partir de son ID.

Si le message n'existe pas, une exception est lancée.

### `MessageRepository::findAll(): array<Message>` 
Retourne la liste de tous les messages enregistrés dans la base de données, 
du plus récent au plus vieux.