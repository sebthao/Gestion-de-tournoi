<?php


namespace App\Controller;

use Cake\Controller\Controller;
use PHPUnit\Framework\Assert;

class UsersController extends AppController
{

    public function index()
    {
    }

    public function watchSports()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'watchsports']);
    }

    public function createSport()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'createsport']);
    }

    public function watchTeams()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'watchteams']);
    }

    public function createTeam()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'createteam']);
    }

    public function watchUsers()
    {
        $allUsers=$this->Users
            ->find()
            ->toArray();

        $this->set('allUsers',$allUsers);

    }

    public function suppressUser($idUserToDelete){
        $allUsers=$this->Users
            ->find()
            ->toArray();

        foreach ($allUsers as $user){
            if($idUserToDelete==$user->id){
                $this->Users->delete($this->Users->get($user->id));
                $this->Flash->success('l\'utilisateur '. $user->name.' a bien été supprimé');
            }
        }
        $this->setAction('adminSight');

    }

    public function createUser()
    {

    }


    public function home()
    {
    }

    public function adminSight()
    {

        $teams = $this->Users->Teams
            ->find()
            ->toArray();

        $sports = $this->Users->Teams->Sports
            ->find()
            ->toArray();

        $loginUser = $this->request->getData("loginUser");

        if (!is_null($teams) && !is_null($loginUser) && !is_null($sports)) {
            $this->set(compact('loginUser', 'teams', 'sports'));
        }


    }

    public function userSight()
    {
        $loginUser = $this->request
            ->getData("loginUser");
        $tournois = $this->Users->Teams->Tournaments
            ->find()
            ->toArray();
        foreach ($tournois as $tournoi) {
            echo $tournoi['id'] . "<br>";
        }

        $this->set(compact('loginUser'));
    }

    public function verification()
    {
        $loginUser = $this->request
            ->getData("loginUser");

        $passwordUser = $this->request
            ->getData("password");

        $listUsers = $this->Users
            ->find()
            ->where(['name' => $loginUser])
            ->where(['password' => $passwordUser])
            ->toArray();

        $loginUser = $this->request
            ->getData("loginUser");

        if (empty($listUsers)) {
            echo "Veuillez entrer une population dans la base";
            $this->setAction('home');
        } else {

            if ($loginUser === "admin" && $passwordUser === "admin") {

                $this->setAction('adminSight');
            } else {
                $this->setAction('userSight');
            }
        }


    }


}