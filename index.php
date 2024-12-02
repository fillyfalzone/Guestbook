<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/classes/Message.php';

session_start();

// Set the page title
$title = "Livre d'Or";

// Retrieve flash messages and form data from the session
$success = $_SESSION['success'] ?? null;
$errors = $_SESSION['error'] ?? [];
$formData = $_SESSION['form_data'] ?? ['username' => '', 'message' => ''];

// Retrieve messages from the session, or use an empty array if not found
$messages = $_SESSION['messages'] ?? [];

// Clear flash messages and form data after displaying
unset($_SESSION['success'], $_SESSION['error'], $_SESSION['form_data']);

require_once 'elements/header.php';
?>

<div class="container my-5">
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

    <h1>Guestbook</h1>

    <form action="traitement.php" method="post">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" required class="form-control my-2 <?= isset($errors['username']) ? 'is-invalid' : '' ?>" value="<?= htmlentities($formData['username']) ?>">
            <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback">
                    <?= htmlentities($errors['username']) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <textarea name="message" required placeholder="Your message..." class="form-control my-2 <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($formData['message']) ?></textarea>
            <?php if (isset($errors['message'])): ?>
                <div class="invalid-feedback">
                    <?= htmlentities($errors['message']) ?>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-lg my-2">Submit</button>
    </form>
    <hr>

    <?php if (!empty($messages)): ?>
        <h1>Your Messages</h1>
        <?php foreach ($messages as $message): ?>
            <?= $message->toHTML() ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php
require_once   'elements/footer.php';
?>