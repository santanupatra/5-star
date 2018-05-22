<?php

namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\Event\Event;
use Cake\ORM\Table;
use ArrayObject;
use Cake\I18n\Time;

class RatingsTable extends Table {

    public function initialize(array $config) {
        $this->table('ratings');
        //$this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior( 'Timestamp' );
        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'dependent' => true,
          ]);
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
