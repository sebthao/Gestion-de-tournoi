<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users');
    }
}