<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $usergroup_id
 * @property int|null $merchant_id
 * @property int|null $deleted
 *
 * @property \App\Model\Entity\Usergroup $usergroup
 * @property \App\Model\Entity\Merchant $merchant
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'usergroup_id' => true,
        'merchant_id' => true,
        'deleted' => true,
        'password' => true,
        'merchant' => true,
    ];
}
