<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entries Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Entry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entry|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entry findOrCreate($search, callable $callback = null, $options = [])
 */
class EntriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('entries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('place')
            ->maxLength('place', 15)
            ->requirePresence('place', 'create')
            ->notEmptyString('place');

        $validator
            ->scalar('comments')
            ->maxLength('comments', 50)
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        $validator
            ->scalar('img_url')
            ->maxLength('img_url', 500)
            ->allowEmptyString('img_url');

        $validator
            ->dateTime('time')
            ->notEmptyDateTime('time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
