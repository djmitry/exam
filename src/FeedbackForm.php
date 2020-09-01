<?php

/**
 * Feedback
 */
class FeedbackForm
{
    /**
     * Validate input
     */
    public function validate($data)
    {
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $text = $data['text'] ?? '';

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        if (!$name) {
            $errors[] = "Wrong name";
        }

        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $errors[] = "Wrong email";
        }

        $text = filter_var($text, FILTER_SANITIZE_STRING);
        if (!$text) {
            $errors[] = "Wrong Text";
        }

        return $errors;
    }

    /**
     * Save 
     * TODO: Do save 
     */
    public function save()
    {
        return true;
    }
}