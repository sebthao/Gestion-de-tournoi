<?php

namespace App\Model\Table;

use App\Model\Entity\Teams;
use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Teams');
        $this->hasOne('Roles');
    }


}
?>