<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users', [
            'through'=>'RolesUsers',
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'user_id'
        ]);
    }
}