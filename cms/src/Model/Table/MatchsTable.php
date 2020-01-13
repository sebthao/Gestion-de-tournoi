<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MatchsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasMany('Teams');
        $this->belongsTo('Tournaments');
        $this->belongsTo('Sports');
    }
}
?>