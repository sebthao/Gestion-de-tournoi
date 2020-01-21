<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MatchsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Teams', [
            'through'=>'MatchsTeams',
            'foreignKey' => 'match_id',
            'targetForeignKey' => 'team_id'
        ]);
        $this->belongsToMany('Tournaments', [
            'through'=>'MatchsTournaments',
            'foreignKey' => 'match_id',
            'targetForeignKey' => 'tournament_id'
        ]);
    }
}
?>