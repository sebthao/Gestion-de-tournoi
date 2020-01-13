<?php

echo $this->Form->create($this,['url' => ['action'=>'userscreatesuser'] ]);
echo $this->Form->button('Retour');
echo $this->Form->end();


echo $this->Form->create($this,['url' => ['action'=>'userscreatesuser'] ]);
echo $this->Form->control('loginUser',['label' => 'Identifiant']);
echo $this->Form->control('password',['label' => 'Mot de passe']);
echo $this->Form->button('Terminer');
echo $this->Form->end();

?>