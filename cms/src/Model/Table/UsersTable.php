<?php

namespace App\Model\Table;

use App\Model\Entity\Teams;
use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Roles', ['through'=>'RolesUsers']);
        $this->belongsToMany('Teams', ['through'=>'TeamsUsers']);
    }


}
?>