# Guestbook 📝

A simple Guestbook project developed in PHP, allowing users to dynamically submit and display messages. This project aims to illustrate PHP basics and several advanced concepts for building web applications.

## Link 
Guestbook link : https://guestbook-pkh4.onrender.com

---

## Features 🚀

- Submit messages with a username.
- Validate form data (minimum length for username and message).
- Manage messages in JSON format stored in a local file.
- Dynamically display existing messages in chronological order.
- Handle errors and provide user feedback with flash messages.
- Simple and responsive user interface with Bootstrap.

---

## Concepts Explored 📚

This project provides an opportunity to explore the following concepts:

### PHP and Object-Oriented Programming
- Creation and use of **classes** (`Message`, `GuestBook`).
- Use of visibility (`private`, `public`) to encapsulate properties and methods.
- Static methods (`fromJSON`) and instance methods (`toJSON`, `toHTML`).
- Error handling through validation methods (`isValid`, `getErrors`).

### Data Manipulation
- Read and write files with `file_get_contents` and `file_put_contents`.
- Store data in **JSON** format and convert it into PHP objects.

### Form Handling
- Process **POST** requests and manage user input.
- Use `filter_var` to sanitize user data.
- Display validation errors with a user-friendly interface.

### Sessions and Redirections
- Use **sessions** to store flash messages and temporary data.
- Redirect users after form submission with `header`.

### Frontend
- Layout and responsive design using **Bootstrap 5**.
- Conditional display of error and success messages.

---

## Prerequisites ⚙️

- **PHP** 7.4 or higher.
- **Composer** for dependency management.
- A local server (e.g., [Laragon](https://laragon.org/) or [XAMPP](https://www.apachefriends.org/)).

---

## Installation and Usage 🚀

1. Clone this repository:
    ```bash
    git clone https://github.com/your-username/guestbook.git
    cd guestbook
    ```

2. Install dependencies with Composer:
    ```bash
    composer install
    ```

3. Start your local server:
    ```bash
    php -S localhost:8000
    ```

4. Access the application in your browser:
    ```
    http://localhost:8000
    ```

---

## Possible Improvements 💡

- Add a database to manage messages instead of a JSON file.
- Implement pagination for messages.
- Introduce an authentication system to secure message submission.
- Add client-side validation using JavaScript.

---

## Author ✍️

This project was created as an exercise to practice PHP and web programming fundamentals. Feel free to fork and suggest improvements!

---

## License 📝

This project is licensed under the MIT License. You are free to use and modify it.

---

Thank you for visiting this project, and enjoy exploring the code! 😊


--------------------------

# Livre d'Or 📝

Un projet simple de Livre d'Or développé en PHP, permettant aux utilisateurs de soumettre et d'afficher des messages de manière dynamique. Ce projet vise à illustrer les bases de PHP et plusieurs concepts avancés pour la création d'applications web.

---

## Fonctionnalités 🚀

- Soumission de messages avec un nom d'utilisateur.
- Validation des données du formulaire (longueur minimale pour le nom d'utilisateur et le message).
- Gestion des messages en JSON stockés dans un fichier local.
- Affichage dynamique des messages existants avec tri chronologique.
- Gestion des erreurs et feedback utilisateur avec messages flash.
- Interface utilisateur simple et responsive avec Bootstrap.

---

## Notions abordées 📚

Ce projet permet d'explorer les concepts suivants :

### PHP et programmation orientée objet
- Création et utilisation de **classes** (`Message`, `GuestBook`).
- Utilisation de la visibilité (`private`, `public`) pour encapsuler les propriétés et méthodes.
- Méthodes statiques (`fromJSON`) et instanciées (`toJSON`, `toHTML`).
- Gestion des erreurs avec des méthodes de validation (`isValid`, `getErrors`).

### Manipulation de données
- Lecture et écriture dans des fichiers avec `file_get_contents` et `file_put_contents`.
- Stockage des données au format **JSON** et conversion en objets PHP.

### Gestion de formulaire
- Traitement des requêtes **POST** et gestion des entrées utilisateur.
- Utilisation de `filter_var` pour assainir les données utilisateur.
- Gestion des erreurs de validation avec affichage visuel.

### Sessions et redirections
- Utilisation des **sessions** pour stocker des messages flash et des données temporaires.
- Redirection après traitement du formulaire avec `header`.

### Frontend
- Mise en page et design responsif avec **Bootstrap 5**.
- Affichage conditionnel des messages d'erreur et de succès.

---

## Prérequis ⚙️

- **PHP** 7.4 ou supérieur.
- **Composer** pour la gestion des dépendances.
- Un serveur local (exemple : [Laragon](https://laragon.org/) ou [XAMPP](https://www.apachefriends.org/)).

---

## Installation et utilisation 🚀

1. Clonez ce dépôt :
    ```bash
    git clone https://github.com/votre-utilisateur/livre-d-or.git
    cd livre-d-or
    ```

2. Installez les dépendances avec Composer :
    ```bash
    composer install
    ```

3. Lancez votre serveur local :
    ```bash
    php -S localhost:8000
    ```

4. Accédez à l'application dans votre navigateur :
    ```
    http://localhost:8000
    ```

---


---

## Améliorations possibles 💡

- Ajout d'une base de données pour gérer les messages au lieu d'un fichier JSON.
- Ajout d'une pagination pour les messages.
- Mise en place d'un système d'authentification pour sécuriser l'ajout de messages.
- Validation côté client avec JavaScript.

---

## Auteur ✍️

Ce projet a été réalisé pour s'exercer aux bases du PHP et de la programmation web. N'hésitez pas à forker et proposer vos améliorations !

---

## Licence 📝

Ce projet est sous licence MIT. Vous êtes libre de l'utiliser et de le modifier.

---

Merci d'avoir visité ce projet, et bonne exploration du code ! 😊


