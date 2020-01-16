<?php


namespace App\Controller;


class SportsController extends AppController
{
    public function createSport()
    {
        $session = $this->getRequest()->getSession();
        $write0OkSession=$session->write('okSession',0);
        $readOkSession=$session->read('okSession');

        if (!is_null($readOkSession)){
            if ($readOkSession==1) {

                $allEtu = $this->Sports
                    ->find()
                    ->toArray();

                foreach ($allEtu as $key => $newSport) {
                    $idNewSport = $key+1;
                }

                var_dump($idNewSport);

                $newSport = $this->Sports->NewEntity();
                $newSport->id = $idNewSport;
                $newSport->label = $this->getRequest()->getData('label');
                $newSport->set = $this->getRequest()->getData('set');
                $newSport->ptsMax = $this->getRequest()->getData('ptsMax');
                $newSport->nbEquipe = $this->getRequest()->getData('nbEquipe');

                if ($this->Sports->save($newSport)) {
                    $this->Flash->success('Sport bien ajouté');
                    $this->getRequest()->getSession()->write('id',"");

                } else {
                    $this->Flash->error('Problème d\'ajout de sport');
                }

           }

        }




    }

    public function voirSport()
    {

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
        var_dump($nbEquipe);

        if ((int)$nbSet>999 || (int)$nbSet<1){
            $this->Flash->error('Veuillez inscrire un nombre set valide');
        }
        if ((int)$ptsMax>999 || (int)$ptsMax<0){
            $this->Flash->error('Veuillez inscrire un nombre de point maximum valide');
        }
        if ((int)$nbEquipe>999 || (int)$nbEquipe<0){
            $this->Flash->error('Veuillez inscrire un nombre d\'équipe se faissant face valide');
        }

        $session=$this->getRequest()->getSession();
        $session->write('okSession',1);


        if ($session->read()==""){
            $this->setAction('returnAdmin');
        }else{
            $this->setAction('createsport');
        }


    }

    public function returnAdmin()
    {
        $this->redirect(['controller' => 'users', 'action' => 'adminSight']);
    }
}