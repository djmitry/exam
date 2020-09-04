<?php

namespace App\components;

use App\components\DB;
use App\components\Csrf;

/**
 * Feedback form
 */
class FeedbackForm
{
    CONST ID = 'feedback';

    private $post;
    private $data;
    public $errors = [];

    /**
     * Load data
     */
    public function load($post): void
    {
        $this->post = $post;
    }

    /**
     * Validate input
     */
    public function validate(): bool
    {
        $post = $this->post;
        $form = $post['form'] ?? null;
        $token = $post['csrf_token'] ?? null;
        $name = $post['name'] ?? '';
        $email = $post['email'] ?? '';
        $text = $post['text'] ?? '';

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

        $this->data = compact('name', 'email', 'text');

        return !count($this->errors);
    }

    /**
     * Save data
     */
    public function save(): bool
    {
        $this->data['created_at'] = date('Y-m-d H:i:s');

        return Db::insert(self::ID, $this->data);
    }

    /**
     * Get errors 
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Render view
     */
    public function render(): void
    {
        require_once APP . '/views/form.php';
    }

    /**
     * Get data
     */
    public function getData($name): ?string
    {
        return $this->data[$name] ?? null;
    }
}