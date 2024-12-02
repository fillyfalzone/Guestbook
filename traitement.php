<?php 
require_once __DIR__ . '/vendor/autoload.php';

use App\classes\GuestBook;
use App\classes\Message;
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Création d'un nouveau message
    $message = new Message($_POST['username'] ?? '', $_POST['message'] ?? '');

     // Direction du fichier
     $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message';
     // On instancie le livre d'or
     $guestbook = new GuestBook($file);

    if ($message->isValid()) {
       
        // On ajoute un message
        $guestbook->addMessage($message);
        
        // Message valide - rediriger avec un message flash de succès
        $_SESSION['success'] = "Le message a été soumis avec succès !";
        unset($_SESSION['form_data']); // Nettoyer les données de formulaire précédentes
    } else {
        // Message invalide - enregistrer les erreurs et données
        $_SESSION['error'] = $message->getErrors();
        $_SESSION['form_data'] = $_POST; // Sauvegarder les données du formulaire
        header('Location: index.php');
        exit;
    }

     // On récupère les messages pour affichage 
     $messages = $guestbook->getMessages();
        
     // Sauvegarder 
     $_SESSION['messages'] = $messages;

     header('Location: index.php');
}
