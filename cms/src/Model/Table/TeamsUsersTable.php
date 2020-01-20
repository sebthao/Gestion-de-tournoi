<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TeamsUsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Users');
        $this->belongsTo('Teams');
    }
}
?>