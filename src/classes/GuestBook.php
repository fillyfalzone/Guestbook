<?php
namespace App\classes;

use DateTime;
use Exception;
use App\classes\Message;

class GuestBook
{
    private string $file;

    public function __construct(string $file)
    {
        $directory = dirname($file);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        } 
        if (!file_exists($file)) {
            touch($file);
        }

        $this->file = $file;
    }

    public function addMessage(Message $message): void
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL , FILE_APPEND);
    }

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

    /**
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
