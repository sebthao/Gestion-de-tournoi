<?php
session_start();

echo $this->Form->create($this, ['url' => ['action' => 'returnAdmin']]);
echo $this->Form->button('Retour');
echo $this->Form->end();


echo $this->Form->create($this, ['url' => ['action' => 'sportsVerification']]);

echo "<tr><td> region   </td><td><select id='region' 	name='region'> 			\n";
/*foreach $etudiants as $etu{
    echo "<option value='Defaut'>".$etu."</option>	\n";
}*/
echo "<option value='Defaut'>Choisir</option>\n";
echo $this->Form->end();

?>