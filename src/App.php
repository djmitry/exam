<?php

namespace App;

use App\FeedbackForm;
use App\Csrf;

class App
{
    // private $errors = [];

    /**
     * 
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
     * 
     */
    private function render($success, $error, $form)
    {
        require_once __DIR__ . '/views/layout.php';
    }

    /**
     * Is post
     * TODO:
     */
    private function isPost()
    {
        return true;
    }
}