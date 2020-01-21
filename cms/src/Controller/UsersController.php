<?php



namespace App\Controller;

use Cake\Controller\Controller;
use PHPUnit\Framework\Assert;

class UsersController extends AppController
{

    public function index()
    {
        //$this->redirect(['controller' => 'users', 'action' => 'accueil']);
    }

    public function usersWatchSports()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'watchsports']);
    }

    public function usersCreateSport()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'createsport']);
    }

    public function usersWatchTeams()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'watchteam']);
    }

    public function usersCreateTeam()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'createteam']);
    }

    public function usersWatchUsers()
    {
        $this->redirect(['controller' => 'users', 'action' => 'watchusers']);
    }

    public function usersCreateUsers()
    {
        $this->redirect(['controller' => 'users', 'action' => 'createuser']);
    }

    public function home()
    {
        $loginUser = $this->request->getData("loginUser");
        $this->set(compact('loginUser'));

    }

    public function adminSight()
    {

        $teams = $this->Users->Teams
            ->find()
            ->toArray();

        $sports = $this->Users->Teams->Sports
            ->find()
            ->toArray();

        $loginUser = $this->request
            ->getData("loginUser");

        if (!is_null($teams) && !is_null($loginUser) && !is_null($sports)) {
            $this->set(compact('loginUser', 'teams', 'sports'));
        }


    }

    public function userSight()
    {
        $loginUser = $this->request
            ->getData("loginUser");
//        $tournois = $this->Users->Teams->Tournaments
//            ->find()
//            ->innerJoinWith(
//                ''
//            );
        $tournois = $this->Users->Teams->Tournaments
            ->find('all')
            ->where('users.login' => )
            ->toArray();
        echo '<pre>'.$tournois.'</pre>';

        /*foreach ($tournois as $tournoi) {
            echo $tournoi['tournamentname'] . "<br>";
        }*/

        $this->set(compact('loginUser', 'tournois'));
    }

    public function verification()
    {
        $loginUser = $this->request
            ->getData("loginUser");

        $passwordUser = $this->request
            ->getData("password");

        $listUsers = $this->Users
            ->find()
            ->where(['login' => $loginUser])
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