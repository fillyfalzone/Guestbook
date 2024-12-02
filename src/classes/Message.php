<?php

namespace App\classes;

use DateTime;

class Message
{
    private string $username;    
    private string $message;
    private DateTime $date;

    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;

    public static function fromJSON (string $json): Message
    {
        $data = json_decode($json, true); // Retourner un tableau associatif

        $date = str_replace(['à', 'h'], ['',':'], $data['date']);
        if ($data) {
            return new self($data['username'], $data['message'], new DateTime( $date));  // Ajouter les données sous forme de tableau
        }
    }
    
    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        // Filtrer les données au moment de leur assignation
        $this->username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->date = $date ?: new DateTime();
    }

    public function isValid(): bool
    {
        // Valide uniquement si aucune erreur n'est retournée
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];

        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = "Le nom d'utilisateur doit contenir au moins " . self::LIMIT_USERNAME . " caractères !";
        }

        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $errors['message'] = "Le message doit contenir au moins " . self::LIMIT_MESSAGE . " caractères !";
        }

        return $errors;
    }

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

    
    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date->format('d/m/Y \à H\hi');

        return $this;
    }

    public function __toString(): string
    {
        return "<p>
                    <strong>{$this->username}</strong> <em>le {$this->getDate()}</em><br>
                    {$this->message}
                </p>";
    }

    public function toJSON (): string 
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->getDate()
        ]);
    }

    public function toHTML (): string
    {
        // Remplace les saut de lignes dans le texte pas des <br> 
        $message = nl2br(htmlentities($this->message));
        $username = htmlentities($this->username);
        $date = htmlentities($this->getDate());

        return <<<HTML
        <div class="card text-bg-light mb-3" >
            <div class="card-header" style="font-size: 10px"> 
                {$date}
            </div>
            <div class="card-body">
                <h5 class="card-title fw-bold" style="font-size: 13px">{$username}</h5>
                <p class="card-text" style="font-size: 12px"> {$message}</p>
            </div>
        </div>
HTML;
    }

    
}
