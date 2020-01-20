<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class SportsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->belongsToMany('Teams', ['through'=>'SportsTeams']);
    }
}