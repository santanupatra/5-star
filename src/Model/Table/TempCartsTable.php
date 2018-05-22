<?php

namespace App\Model\Table;

use App\Model\Entity\Customer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $Templates
 */
class TempCartsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('temp_carts');
        
        $this->primaryKey('id');
        
        
       
         $this->belongsTo('Services', [
          'foreignKey' => 'service_id',
         'dependent' => true,
          ]);
         $this->belongsTo('Users', [
          'foreignKey' => 'user_id',
         'dependent' => true,
         'PropertyNmae' =>'Users'
          ]);
         // $this->belongsTo('Users', [
         //  'foreignKey' => 'service_owner_id',
         // 'dependent' => true,
         // 'PropertyName' => 'Owoner'
         //  ]);

         
   }
          
       
    

    

}
