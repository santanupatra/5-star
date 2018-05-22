<?php

namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\Event\Event;
use Cake\ORM\Table;
use ArrayObject;
use Cake\I18n\Time;

class ReportsTable extends Table {

    public function initialize(array $config) {
        $this->table('reports');
        //$this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior ( 'Timestamp' );
        
        
        /*$this->hasMany('ServiceProviderImages', [
          'foreignKey' => 'serviceprovider_id',
          'dependent' => true,
          ]);*/
        
          
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options) {
    }

    public function beforeSave(Event $event) {
        $event->dateField = date('Y-m-d', strtotime($event->dateField));
        $entity = $event->data['entity'];
        
        if ($entity->isNew()) {
            $hasher = new DefaultPasswordHasher();
        }
        return true;
    }


}
