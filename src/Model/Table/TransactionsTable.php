<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Misc\Functions;
use Cake\ORM\TableRegistry;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 *
 * @method \App\Model\Entity\Transaction newEmptyEntity()
 * @method \App\Model\Entity\Transaction newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransactionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('transactions');
        $this->setDisplayField('name');

        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchants_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('payment_id')
            ->maxLength('payment_id', 255)
            ->allowEmptyString('payment_id');

        $validator
            ->integer('log_id')
            ->allowEmptyString('log_id');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 45)
            ->allowEmptyString('amount');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 45)
            ->allowEmptyString('currency');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        $validator
            ->scalar('payment_date')
            ->maxLength('payment_date', 45)
            ->allowEmptyString('payment_date');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

        $validator
            ->integer('merchants_id')
            ->allowEmptyString('merchants_id');

        $validator
            ->scalar('date')
            ->maxLength('date', 45)
            ->allowEmptyString('date');

        $validator
            ->integer('deleted')
            ->allowEmptyString('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('merchants_id', 'Merchants'), ['errorField' => 'merchants_id']);

        return $rules;
    }


    public function logPayment($payment_id,$ref,$log_id,$last_four,$amount,$currency,$name,$email,$phone,$payment_date,$status_id,$ip,$merchant_id){
        $functions = new Functions();
        $famount = $functions->formatAmount($amount);
        //print_r($famount);exit;
        $data = array();
        $paymentTbl = TableRegistry::get('Transactions');
        $data = $paymentTbl->newEmptyEntity();
        $data->payment_id = $payment_id;
        $data->ref = $ref;
        $data->log_id = $log_id;
        $data->last_four = $last_four;
        $data->amount = $famount;
        $data->currency = $currency;
        $data->name = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->payment_date = $payment_date;
        $data->status_id = $status_id;
        $data->merchants_id = $merchant_id;
        $data->ip = $ip;
        $data->date = date('Y-m-d H:i');
        //print_r($data);exit;
        $paymentTbl->save($data);
        return;
    }


    public function getReport($date_from, $date_to, $merchant_id){
        $paymentTbl = TableRegistry::get('Transactions');
            $condition =array();
            if($date_from and !$date_to) $condition[]="payment_date >= '$date_from' ";    
            if($date_to and !$date_from) $condition[]="payment_date <= '$date_to' ";  
            if($date_to and $date_from) $condition[]="payment_date  between  '$date_from' and '$date_to' ";   
            $condition[]="merchants_id = 1";  
            $condition[]="deleted=0";    

           //print_r($condition);exit;
        
            $condition = implode ( ' and ' , $condition );
            $table = 'transactions';

            //$conn = ConnectionManager::get('default');
            if(!empty($condition)){
                $query = $paymentTbl->find('all', [
                    'conditions' => $condition,
                    'order' => ['Transactions.id'=>'DESC']
                ]);
                $results = $query->toArray();
                //print_r($results);exit;
                return $results;
            }

    }

    public function getTodaysPayment($merchant_id){
        $paymentTbl = TableRegistry::get('Transactions');
        $query = $paymentTbl->find('all', [
            'conditions' => ['Transactions.merchants_id'=>$merchant_id,'Transactions.payment_date LIKE' => date('Y-m-d').'%']
        ]);
        $result = $query->toArray();
        return $result;
    }
}
