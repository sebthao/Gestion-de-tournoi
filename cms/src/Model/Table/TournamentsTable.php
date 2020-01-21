<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TournamentsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Teams', [
            'through'=>'TeamsTournaments',
            'foreignKey' => 'tournament_id',
            'targetForeignKey' => 'team_id'
        ]);
        $this->belongsToMany('Matchs', [
            'through'=>'MatchsTournaments',
            'foreignKey' => 'tournament_id',
            'targetForeignKey' => 'match_id'
        ]);
    }
}