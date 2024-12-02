
<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\classes\GuestBook;
use App\classes\Message;

session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a new message object from the posted data
    $message = new Message($_POST['username'] ?? '', $_POST['message'] ?? '');

    // Get the path to the message file
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message';

    // Create a new GuestBook instance
    $guestbook = new GuestBook($file);

    // Check if the message is valid
    if ($message->isValid()) {
        // Add the message to the guestbook
        $guestbook->addMessage($message);

        // Set a success message and redirect to the index page
        $_SESSION['success'] = "The message has been submitted successfully!";
        unset($_SESSION['form_data']); // Clear previous form data
    } else {
        // Set error messages and redirect to the index page
        $_SESSION['error'] = $message->getErrors();
        $_SESSION['form_data'] = $_POST; // Save form data for repopulation
        header('Location: index.php');
        exit;
    }

    // Retrieve all messages from the guestbook
    $messages = $guestbook->getMessages();

    // Save messages to the session for display on the index page
    $_SESSION['messages'] = $messages;

    // Redirect to the index page
    header('Location: index.php');
}
