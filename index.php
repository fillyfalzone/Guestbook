<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__  . '/src/classes/Message.php';

session_start();
$title = "Livre d'Or";

// Récupérer les messages flash et les données du formulaire
$success = $_SESSION['success'] ?? null;
$errors = $_SESSION['error'] ?? [];
$formData = $_SESSION['form_data'] ?? ['username' => '', 'message' => ''];

// Vérifier si les messages existent dans la session, sinon utiliser un tableau vide

$messages = $_SESSION['messages'] ?? [];

// Effacer les messages flash et les données après affichage
unset($_SESSION['success'], $_SESSION['error'], $_SESSION['form_data']);

require_once 'elements/header.php';
?>

<div class="container my-5">
    <!-- Affichage des messages flash -->
    <?php if ($success): ?>
    <div class="alert alert-success">
        <?= htmlentities($success) ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlentities($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <h1>PT Livre d'Or</h1>

    <form action="traitement.php" method="post">
        <div class="form-group">
            <input 
                value="<?= htmlentities($formData['username']) ?>" 
                type="text" 
                name="username" 
                placeholder="Nom d'utilisateur" 
                required  
                class="form-control my-2 <?= isset($errors['username']) ? 'is-invalid' : '' ?>">

            <?php if (isset($errors['username'])): ?>
            <div class="invalid-feedback">
                <?= htmlentities($errors['username']) ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <textarea 
                name="message" 
                required 
                placeholder="Votre message ..." 
                class="form-control my-2 <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
            ><?= htmlentities($formData['message']) ?></textarea>

            <?php if (isset($errors['message'])): ?>
            <div class="invalid-feedback">
                <?= htmlentities($errors['message']) ?>
            </div>
            <?php endif; ?>
        </div>
        
        <button type="submit" class="btn btn-primary btn-lg my-2">Soumettre</button>
    </form>
    <hr>
    <!-- Affichage des messages-->
    <?php if(!empty($messages)): ?>
        <h1 class="mt-4">Vos messages</h1>
        <?php foreach($messages as $message): ?>
            <?= $message->toHTML() ?>
        <?php endforeach ?>
    <?php endif ?>
</div>

<?php
require_once 'elements/footer.php';
?>
