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
class PostsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('posts');
        
        $this->primaryKey('id');
        
        
       
         $this->belongsTo('Services', [
          'foreignKey' => 'service_id',
         'dependent' => true,
          ]);
          $this->belongsTo('Users', [
          'foreignKey' => 'user_id',
         'dependent' => true,
          ]);

         $this->hasMany('ServiceImages', [
          'foreignKey' => 'post_id',
          'dependent' => true,
          ]);

         $this->hasMany('Comments', [
          'foreignKey' => 'service_id',
         'dependent' => true,
          ]);

         $this->hasMany('Likes', [
          'foreignKey' => 'service_id',
          'dependent' => true,
          ]);

         $this->hasMany('Reports', [
          'foreignKey' => 'service_id',
          'dependent' => true,
          ]);

         $this->hasMany('Ratings', [
          'foreignKey' => 'service_id',          
          'dependent' => true,
          ]);

         $this->hasMany('Favourites', [
          'foreignKey' => 'service_id', 
           'type' => 'LEFT',         
          'dependent' => true,
          ]);
         
         
        
   }
          
       
    

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
    public function buildRules(RulesChecker $rules) {
        //$rules->add($rules->isUnique(['slug'], 'Slug Already Used Try with another'));
        //$rules->add($rules->isUnique(['username'], 'Username Already Used Try with another'));
        return $rules;
    }

}
