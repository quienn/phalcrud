<?php

declare(strict_types=1);

use App\Models\User;
use Phalcon\Mvc\Controller;

class EditController extends Controller
{
    public function indexAction(): void
    {
        $id = $this->request->getQuery('id');

        $this->view->user = User::findFirst($id);

        if (!$id) {
            $this->response->redirect('index');
        }

        if (!$this->view->user) {
            $this->view->success = 'error';
            $this->view->message = 'no se ha encontrado el usuario';
            $this->view->pick('common/message');
        }
    }

    public function updateAction(): void
    {
        $post = $this->request->getPost();
        $user = User::findFirst($post['id']);
        $user->name = $post['name'];
        $user->email = $post['email'];
        $user->pass = $post['pass'];
        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            $message = 'usuario actualizado';
        } else {
            $message = 'no se pudo actualizar el usuario: '
                . implode('<br>', $user->getMessages());
        }

        $this->view->message = $message;
        $this->view->pick('common/message');
    }
}
