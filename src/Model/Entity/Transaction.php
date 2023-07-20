<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string|null $payment_id
 * @property int|null $log_id
 * @property string|null $amount
 * @property string|null $currency
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $payment_date
 * @property int|null $status_id
 * @property int|null $merchants_id
 * @property string|null $date
 * @property int|null $deleted
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Merchant $merchant
 */
class Transaction extends Entity
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
        'id' => true,
        'payment_id' => true,
        'log_id' => true,
        'amount' => true,
        'currency' => true,
        'name' => true,
        'email' => true,
        'phone' => true,
        'payment_date' => true,
        'status_id' => true,
        'merchants_id' => true,
        'date' => true,
        'deleted' => true,
        'status' => true,
        'merchant' => true,
    ];
}
