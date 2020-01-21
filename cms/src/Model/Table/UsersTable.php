<?php

namespace App\Model\Table;

use App\Model\Entity\Teams;
use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Roles', [
            'through'=>'RolesUsers',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'user_id'
        ]);
        $this->belongsToMany('Teams', [
            'through'=>'TeamsUsers',
            'foreignKey' => 'team_id',
            'targetForeignKey' => 'user_id'
        ]);
    }

}
?>