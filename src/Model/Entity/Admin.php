<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Admin extends Entity {

    // Code from bake.

    protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}
