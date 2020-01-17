<?php


namespace App\Controller;
use Cake\ORM\TableRegistry;



class SportsController extends AppController
{
    public function createSport()
    {
        $session = $this->getRequest()->getSession();
        $write0OkSession=$session->write('okSession',0);
        $readOkSession=$session->read('okSession');
    }

    public function watchSports()
    {
        $allSports=$this->Sports
            ->find()
            ->toArray();
        $this->set('allSports',$allSports);
    }

    public function suppressSport($idSportToDelete){
        $allSports=$this->Sports
            ->find()
            ->toArray();

        foreach ($allSports as $sport){
            if($idSportToDelete==$sport->id){
                $this->Users->delete($this->Users->get($sport->id));
                $this->Flash->success('l\'utilisateur '. $sport->label.' a bien été supprimé');
            }
        }
        $this->setAction('adminSight');
    }


    public function sportsVerification()
    {
        $dataFromNewSport=$this->request;
        $label=$dataFromNewSport->getData('label');
        $nbSet=$dataFromNewSport->getData('nbset');
        $ptsMax=$dataFromNewSport->getData('ptsMax');
        $nbEquipe=$dataFromNewSport->getData('nbEquipe');
        var_dump($dataFromNewSport->getData());echo "<br>";
        var_dump($label);echo "<br>";
        var_dump($nbSet);echo "<br>";
        var_dump($ptsMax);echo "<br>";
        var_dump($nbEquipe);echo "<br>";

        $allEtu = $this->Sports
            ->find()
            ->toArray();

        foreach ($allEtu as $key => $newSport) {
            $idNewSport = $key+1;
        }

        $newSport = $this->Sports->NewEntity();

        $newSport->id = $idNewSport;
        $newSport->label = $label;
        $newSport->set = $nbSet;
        $newSport->ptsMax = $ptsMax;
        $newSport->nbEquipe =$nbEquipe;
        var_dump($newSport);

        $session=$this->getRequest()->getSession();
        $session->write('okSession',1);
        $session->write('poster',1);

        if ((int)$nbSet>999 || (int)$nbSet<1){
            $this->Flash->error('Veuillez inscrire un nombre set valide');
            $session->write('poster',0);
        }
        if ((int)$ptsMax>999 || (int)$ptsMax<1){
            $this->Flash->error('Veuillez inscrire un nombre de point maximum valide');
            $session->write('poster',0);
        }
        if ((int)$nbEquipe>999 || (int)$nbEquipe<1){
            $this->Flash->error('Veuillez inscrire un nombre d\'équipe se faissant face valide');
            $session->write('poster',0);
        }

        if ((int)$session->read('poster')==1){
            $this->Sports->save($newSport);
            $this->setAction('returnAdmin');
            $this->Flash->success('un nouveau sport: '.$label.' a été ajouté.');
        }else{
            $this->setAction('createsport');
            $this->Flash->error('le sport: '.$label.' n\'a pas été ajouté.');
        }


    }

    public function returnAdmin()
    {
        $this->redirect(['controller' => 'users', 'action' => 'adminSight']);
    }
}