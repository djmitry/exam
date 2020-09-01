<?php

namespace App;

use App\FeedbackForm;

/**
 * App
 */
class App
{
    /**
     * Run app
     */
    public function run()
    {
        $success = '';
        $error = '';
        $form = new FeedbackForm();

        if ($this->isPost()) {
            $form->load($_POST);
            if ( $form->validate() && $form->save() ) {
                $success = 'Form saved';
            } else {
                $error = 'Form not saved';
            }
        }

        return $this->render($success, $error, $form);
    }

    /**
     * Render view
     */
    private function render($success, $error, $form)
    {
        require_once __DIR__ . '/views/layout.php';
    }

    /**
     * Check is post
     */
    private function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}