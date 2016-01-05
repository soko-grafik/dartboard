<?php
namespace Application\Controller;

use Application\Model\User;
use Ouzo\Controller;

class PlayersController extends Controller
{
    public function init()
    {
        $this->layout->setLayout('layout');
    }

    public function index()
    {
        $this->view->users = User::all();
        $this->view->render();
    }

    public function fresh()
    {
        $this->view->user = new User();
        $this->view->render();
    }

    public function show()
    {
        $this->view->user = User::findById($this->params['id']);
        $this->view->render();
    }

    public function create()
    {
        $user = new User($this->params['user']);
        if ($user->isValid()) {
            $user->insert();
            $this->redirect(playersPath(), "User added");
        } else {
            $this->view->user = $user;
            $this->view->render('Players/fresh');
        }
    }

    public function edit()
    {
        $this->view->user = User::findById($this->params['id']);
        $this->view->render();
    }

    public function update()
    {
        $user = User::findById($this->params['id']);
        if ($user->updateAttributes($this->params['user'])) {
            $this->redirect(playerPath($user->id), "User updated");
        } else {
            $this->view->user = $user;
            $this->view->render('Players/edit');
        }
    }
}
