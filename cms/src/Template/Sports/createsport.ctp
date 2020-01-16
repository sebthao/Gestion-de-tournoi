<?php

echo $this->Form->create($this, ['url' => ['action' => 'returnAdmin']]);
echo $this->Form->button('Retour');
echo $this->Form->end();


echo $this->Form->create($this, ['url' => ['action' => 'sportsVerification']]);
echo $this->Form->control('label', ['label' => 'Label', 'required' => 'true', 'placeholder' => 'ex: Sport']);
echo $this->Form->control('nbset', ['label' => 'Nombre de Set', 'required' => 'true', 'placeholder' => 'ex: 10']);
echo $this->Form->control('ptsMax', ['label' => 'Nombre de Points Maximum', 'required' => 'true', 'placeholder' => 'ex: 999']);
echo $this->Form->control('nbEquipe', ['label' => 'Nombre d\'equipe se faisant face', 'required' => 'true', 'placeholder' => 'ex: 1']);
echo $this->Form->button('Terminer');
echo $this->Form->end();

?>




