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
        if ($this->isPost()) {
            $form = new FeedbackForm($_POST);
            if ( $form->validate() && $form->save() ) {
                $success[] = 'Form saved';
            } else {
                $errors[] = 'Wrong form data';
            }
        }

        return $this->render();
    }

    /**
     * 
     */
    private function render()
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