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

    public function usersvoirsports()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'sportsvoirsports']);
    }

    public function userscreatesport()
    {
        $this->redirect(['controller' => 'sports', 'action' => 'sportscreatesport']);
    }

    public function usersvoirteams()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'teamsvoirteam']);
    }

    public function userscreateteams()
    {
        $this->redirect(['controller' => 'teams', 'action' => 'teamscreateteam']);
    }

    public function usersvoirusers()
    {

    }

    public function userscreateusers()
    {

    }



    public function accueil()
    {
        $loginUser=$this->request->getData("loginUser");
        $this->set(compact('loginUser'));

    }

    public function affichageAdmin()
    {

        $teams=$this->Users->Teams->find() ->toArray();
        $sports=$this->Users->Teams->Sports->find()->toArray();
        $loginUser=$this->request->getData("loginUser");

        if(!is_null($teams) && !is_null($loginUser) && !is_null($sports)){
            $this->set(compact('loginUser','teams','sports'));
        }



    }

    public function affichageUser()
    {
        $loginUser=$this->request->getData("loginUser");
        $tournois=$this->Users->Teams->Tournaments
            ->find()
            ->toArray();
        foreach ($tournois as $tournoi){
            echo $tournoi['id']."<br>";
        }

        $this->set(compact('loginUser'));
    }

    public function verification()
    {
        $loginUser=$this->request->getData("loginUser");
        $passwordUser=$this->request->getData("password");
        $listUsers = $this->Users
            ->find()
            ->where(['name'=>$loginUser])
            ->where(['password'=>$passwordUser])
            ->toArray();
        $loginUser=$this->request->getData("loginUser");
        if(empty($listUsers)){
            echo "Veuillez entrer une population dans la base";
            $this->setAction('acceuil');
        }else{

            if($loginUser==="admin"&& $passwordUser==="admin"){

                $this->setAction('affichageAdmin');
            }
            else {
                $this->setAction('affichageUser');
            }
        }


    }



}