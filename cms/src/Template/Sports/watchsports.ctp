<?php

echo $this->Form->create($this, ['url' => ['action' => 'returnAdmin']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

foreach ($allSports as $sport){
    echo "id".$sport->id."Nom du sport: ". $sport->label.
        " nombre de set:".$sport->set.
        " nombre de point max: ".$sport->ptsMax.
        "nombre d\'équipes se faisant face: ".$sport->nbEquipe;
    echo $this->Form->create($this, ['url' => ['action' => 'suppressTeam',$sport->id]]);
    echo $this->Form->button('Supprimer');
    echo $this->Form->end();
}
?>