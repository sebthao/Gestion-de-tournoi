<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RolesUsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Roles');
        $this->belongsTo('Users');
    }
}
?>