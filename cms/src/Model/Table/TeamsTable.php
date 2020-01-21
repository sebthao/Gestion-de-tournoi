<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TeamsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users', [
            'through'=>'TeamsUsers',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'user_id'
        ]);
        $this->belongsToMany('Tournaments', [
            'through'=>'TeamsTournaments',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'tournament_id'
        ]);
        $this->belongsToMany('Matchs', [
            'through'=>'MatchsTeams',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'match_id'
        ]);
        $this->belongsToMany('Sports', [
            'through'=>'SportsTeams',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'sport_id'
        ]);
    }
}