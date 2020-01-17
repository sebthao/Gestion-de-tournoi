<?php


namespace App\Controller;


class TeamsController extends AppController
{

    public function createTeam()
    {
    }


    public function watchTeams()
    {
        $allTeams=$this->Teams
            ->find()
            ->toArray();

        $this->set('allTeams',$allTeams);
    }

    public function suppressTeam($idTeamToDelete){
        $allTeams=$this->Teams
            ->find()
            ->toArray();

        foreach ($allTeams as $team){


            if($idTeamToDelete==$team->id){
                $this->Users->delete($this->Users->get($team->id));
                $this->Flash->success('l\'utilisateur '. $team->teamname.' a bien été supprimé');
            }
        }
        $this->setAction('returnAdmin');
    }
    public function teamVerification()
    {

    }

    public function returnAdmin()
    {
        $this->redirect(['controller' => 'users', 'action' => 'adminSight']);
    }
}