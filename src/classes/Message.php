<?php

namespace App\classes;

use DateTime;

class Message
{
    private string $username;
    private string $message;
    private DateTime $date;

    // Define constants for minimum length requirements
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;

    // Factory method to create a Message object from JSON data
    public static function fromJSON(string $json): Message
    {
        $data = json_decode($json, true); // Decode JSON into an associative array

        // Format the date string to a valid DateTime format
        $date = str_replace(['à', 'h'], ['', ':'], $data['date']);

        if ($data) {
            return new self($data['username'], $data['message'], new DateTime($date));
        }
    }

    // Constructor to initialize the Message object
    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        // Sanitize user input to prevent XSS attacks
        $this->username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Set the date to the current time if not provided
        $this->date = $date ?? new DateTime();
    }

    // Check if the message is valid based on length requirements
    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    // Get an array of validation errors
    public function getErrors(): array
    {
        $errors = [];

        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = "Username must be at least " . self::LIMIT_USERNAME . " characters long!";
        }

        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $errors['message'] = "Message must be at least " . self::LIMIT_MESSAGE . " characters long!";
        }

        return $errors;
    }

    // String representation of the message
    public function __toString(): string
    {
        return "<p>
                    <strong>{$this->username}</strong> <em>le {$this->getDate()}</em><br>
                    {$this->message}
                </p>";
    }

    // Convert the message to JSON format
    public function toJSON(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->getDate()
        ]);
    }

    // Convert the message to HTML format
    public function toHTML(): string
    {
        $message = nl2br(htmlentities($this->message));
        $username = htmlentities($this->username);
        $date = htmlentities($this->getDate());

        return <<<HTML
            <div class="card text-bg-light mb-3">
                <div class="card-header" style="font-size: 10px">
                    {$date}
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="font-size: 13px">{$username}</h5>
                    <p class="card-text" style="font-size: 12px">{$message}</p>
                </div>
            </div>
HTML;
    }

    // Getters for username, message, and formatted date
    public function getUserName(): string
    {
        return $this->username;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDate(): string
    {
        return $this->date->format('d/m/Y \à H\hi');
    }

    // Setter for message
    public function setMessage(string $message): self
    {
        $this->message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $this;
    }

    // Setter for username
    public function setUsername(string $username): self
    {
        $this->username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $this;
    }

    // Setter for date
    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }
}