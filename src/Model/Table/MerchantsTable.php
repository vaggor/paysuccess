<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Merchants Model
 *
 * @property \App\Model\Table\SettingsTable&\Cake\ORM\Association\HasMany $Settings
 *
 * @method \App\Model\Entity\Merchant newEmptyEntity()
 * @method \App\Model\Entity\Merchant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Merchant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Merchant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Merchant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Merchant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Merchant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Merchant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MerchantsTable extends Table
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

        $this->setTable('merchants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Settings', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'merchant_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);

        return $rules;
    }


    public function listMerchants(){
        $data = $this->find('list',['keyField' => 'id','valueField' => 'name'])
            ->select(['id'])
            ->where(['deleted'=>0])
            ->toArray();
            return $data;
    }
}
