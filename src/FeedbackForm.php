<?php

namespace App;

/**
 * Feedback form
 */
class FeedbackForm
{
    CONST ID = 'feedback';

    private $data;
    public $errors = [];

    /**
     * Load data
     */
    public function load($data): void
    {
        $this->data = $data;
    }

    /**
     * Validate input
     */
    public function validate(): bool
    {
        $data = $this->data;
        $form = $data['form'] ?? null;
        $token = $data['csrf_token'] ?? null;
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $text = $data['text'] ?? '';

        if( $form !== self::ID ) {
            $this->errors[] = 'Wrong form';
        }
        
        if( !Csrf::validate($token) ) {
            $this->errors[] = 'Wrong token';
        }

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        if (!$name) {
            $this->errors[] = "Wrong name";
        }

        if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $this->errors[] = "Wrong email";
        }

        $text = filter_var($text, FILTER_SANITIZE_STRING);
        if (!$text) {
            $this->errors[] = "Wrong Text";
        }

        return !count($this->errors);
    }

    /**
     * Save data
     * TODO: Do save 
     */
    public function save()
    {
        
        return true;
    }

    /**
     * Get errors 
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Render view
     */
    public function render()
    {
        require_once __DIR__ . '/views/form.php';
    }
}