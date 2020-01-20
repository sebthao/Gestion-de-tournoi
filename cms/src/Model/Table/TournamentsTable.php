<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TournamentsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Teams', ['through'=>'TeamsTournaments']);
        $this->belongsToMany('Matchs', ['through'=>'MatchsTournaments']);
    }
}