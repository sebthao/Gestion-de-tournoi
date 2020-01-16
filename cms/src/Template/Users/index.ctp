<?php
session_start();

echo $this->Form->create($this, ['url' => ['action' => 'verification']]);
echo $this->Form->control('loginUser', ['label' => 'Identifiant']);
echo $this->Form->control('password', ['label' => 'Mot de passe']);
echo $this->Form->button('Valider');
echo $this->Form->end();

?>
