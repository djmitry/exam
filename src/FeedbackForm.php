<?php

namespace App;

/**
 * Feedback
 */
class FeedbackForm
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Validate input
     */
    public function validate(): bool
    {
        $data = $this->data;
        $token = $data['token'] ?? null;
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $text = $data['text'] ?? '';

        if( !Csrf::validate($token) ) {
            $this->errors[] = 'Wrong token';
        }

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        if (!$name) {
            $this->errors[] = "Wrong name";
        }

        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $this->errors[] = "Wrong email";
        }

        $text = filter_var($text, FILTER_SANITIZE_STRING);
        if (!$text) {
            $this->errors[] = "Wrong Text";
        }

        return (bool) count($this->errors);
    }

    /**
     * Save 
     * TODO: Do save 
     */
    public function save()
    {
        return true;
    }

    /**
     * Render 
     */
    public static function render()
    {
        require_once __DIR__ . '/views/form.php';
    }
}