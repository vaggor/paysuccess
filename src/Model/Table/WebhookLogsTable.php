<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * WebhookLogs Model
 *
 * @method \App\Model\Entity\WebhookLog newEmptyEntity()
 * @method \App\Model\Entity\WebhookLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\WebhookLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\WebhookLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebhookLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebhookLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebhookLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebhookLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebhookLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WebhookLogsTable extends Table
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

        $this->setTable('webhook_logs');
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
            ->scalar('payload')
            ->allowEmptyString('payload');

        $validator
            ->scalar('date')
            ->maxLength('date', 45)
            ->allowEmptyString('date');

        return $validator;
    }


    public function logPayload($payload){
        //print_r($payload);exit;
        $data = array();
        $logsTbl = TableRegistry::get('WebhookLogs');
        $data = $logsTbl->newEmptyEntity();
        $data->payload = $payload;
        $data->date = date('Y-m-d H:i');
        //print_r($data);exit;
        $result = $logsTbl->save($data);
        return $result->id;
    }
}
