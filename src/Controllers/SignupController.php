<?php

declare(strict_types=1);

use App\Models\User;
use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction(): void
    {
    }

    public function registerAction(): void
    {
        $post = $this->request->getPost();
        $user = new User();
        $user->name = $post['name'];
        $user->email = $post['email'];
        $user->pass = $post['pass'];
        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            $message = 'usuario creado';
        } else {
            $message = 'no se pudo crear el usuario: '
                . implode('<br>', $user->getMessages());
        }

        $this->view->message = $message;
        $this->view->pick('common/message');
    }
}
