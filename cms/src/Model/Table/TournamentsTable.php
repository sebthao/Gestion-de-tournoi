<?php


namespace App\Model\Table;

use Cake\ORM\Table;

class TournamentsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Teams');
        $this->hasOne('Roles');
        $this->belongsTo('Sports');
    }
}