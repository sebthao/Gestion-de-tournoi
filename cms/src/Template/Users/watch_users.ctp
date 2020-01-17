<?php

echo $this->Form->create($this, ['url' => ['action' => 'adminSight']]);
echo $this->Form->button('Retour');
echo $this->Form->end();

foreach ($allUsers as $user){
    echo "Id:".$user->id."Name: ". $user->name." password: ". $user->password;
    echo $this->Form->create($this, ['url' => ['action' => 'suppressTeam',$user->id]]);
    echo $this->Form->button('Supprimer');
    echo $this->Form->end();
}
?>