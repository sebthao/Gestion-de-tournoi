<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TeamsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasMany('Users');
        $this->belongsToMany('Matchs');
        $this->belongsToMany('Tournaments');
        $this->belongsTo('Sports');
    }
}