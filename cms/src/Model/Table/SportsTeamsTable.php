<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SportsTeamsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Sports');
        $this->belongsTo('Teams');
    }
}
?>