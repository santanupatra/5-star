<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Run Entity.
 *
 * @property int $id
 * @property string $run_name
 * @property string $run_no
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Order[] $orders
 */
class Banner extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */


}
