<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MatchsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Teams', ['through'=>'MatchsTeams']);
        $this->belongsToMany('Tournaments', ['through'=>'MatchsTournaments']);
    }
}
?>