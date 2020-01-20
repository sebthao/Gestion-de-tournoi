<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TeamsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users', ['through'=>'TeamsUsers']);
        $this->belongsToMany('Tournaments', ['through'=>'TeamsTournaments']);
        $this->belongsToMany('Matchs', ['through'=>'MatchsTeams']);
        $this->belongsToMany('Sports', ['through'=>'SportsTeams']);
    }
}