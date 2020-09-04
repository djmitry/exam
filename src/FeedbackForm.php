<?php

namespace App;

use App\DB;

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
     * TODO: Do save 
     */
    public function save()
    {
        // $this->data['created_at'] = date('Y-m-d H:i:s');
        $data = [
            'name' => 'Name', 
            'email' => 'bb', 
            'text' => 'dff', 
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Db::insert('feeadback', $this->data);

        $fields = "`" . implode('`,`', array_keys($data)) . "`";
        $values = substr(str_repeat('?,', count($data)), 0, -1);
        $params = array_values($data);

        $sql = "INSERT INTO `" . $tablename . "` (" . $fields . ") VALUES(" . $values . ")";
        $stm = Db::db()->prepare($sql);
        $stm->execute($params);

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