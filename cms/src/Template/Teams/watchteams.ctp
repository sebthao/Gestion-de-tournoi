<?php

echo $this->Form->create($this, ['url' => ['action' => 'returnAdmin']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

foreach ($allTeams as $team){
    echo "Id:". $team->id. "Nom du groupe: ". $team->teamname;
    echo $this->Form->create($this, ['url' => ['action' => 'suppressTeam',$team->id]]);
    echo $this->Form->button('Supprimer');
    echo $this->Form->end();
}
?>