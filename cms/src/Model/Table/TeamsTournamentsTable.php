<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TeamsTournamentsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Tournaments');
        $this->belongsTo('Teams');
    }
}
?>