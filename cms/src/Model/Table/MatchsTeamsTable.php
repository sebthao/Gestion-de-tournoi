<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MatchsTeamsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Matchs');
        $this->belongsTo('Teams');
    }
}
?>