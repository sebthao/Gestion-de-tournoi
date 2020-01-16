<?php


namespace App\Controller;


class TeamsController extends AppController
{

    public function createTeam()
    {
    }

    public function watchTeam()
    {

    }

    public function teamVerification()
    {

    }

    public function returnAdmin()
    {
        $this->redirect(['controller' => 'users', 'action' => 'adminSight']);
    }
}