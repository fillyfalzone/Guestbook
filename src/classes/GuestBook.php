<?php

namespace App\classes;

use DateTime;
use Exception;
use App\classes\Message;

class GuestBook

{
    private string $file;

    /**
     * Constructs a new GuestBook instance.
     *
     * @param string $file The path to the file where messages are stored.
     *
     * Ensures the file and its directory exist, creating them if necessary.
     */
    public function __construct(string $file)
    {
        $directory = dirname($file);

       // Creates the directory if it doesn't exist, and sets permissions
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Creates the directory recursively
        } 

        // Creates the file if it doesn't exist, and sets permissions
        if (!file_exists($file)) {
            touch($file); // Creates the file if it doesn't exist
            chmod($file, 0666); // Sets write permissions for the file
        }

        $this->file = $file;
    }

    /**
     * Adds a new message to the guestbook.
     *
     * @param Message $message The message to add.
     *
     * Appends the JSON representation of the message to the file.
     */
    public function addMessage(Message $message): void
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    /**
     * Retrieves all messages from the guestbook.
     *
     * Reads the file, parses each line as a JSON string, and creates Message objects.
     *
     * @return Message[] An array of Message objects.
     */
    public function getMessages(): array
    {
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $messages = [];

        foreach ($lines as $line) {
            $messages[] = Message::fromJSON($line);
        }

        return $messages;
    }

    // Getters and setters for the file property
    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;
        return $this;
    }
}