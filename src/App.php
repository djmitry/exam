<?php

namespace App;

use App\components\FeedbackForm;
use App\components\Flash;

/**
 * App
 */
class App
{
    private $flash;

    /**
     * Init
     */
    public function __construct()
    {
        $this->flash = new Flash();
    }

    /**
     * Run app
     */
    public function run()
    {
        $form = new FeedbackForm();

        if ($this->isPost()) {
            $form->load($_POST);
            if ( $form->validate() && $form->save() ) {
                $this->flash->add('success', 'Спасибо, ' . $form->getData('name'));
                $this->redirect('/');
            } else {
                $this->flash->add('error', 'Form not saved');
            }
        }

        return $this->render($form);
    }

    /**
     * Render view
     */
    private function render($form)
    {
        require_once APP . '/views/layout.php';
    }

    /**
     * Check is post
     */
    private function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Redirect
     */
    private function redirect(string $location): void
    {
        Header('Location: ' . $location);
        exit;
    }
}