<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Continents Model
 *
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsToMany $Countries
 *
 * @method \App\Model\Entity\Continent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Continent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Continent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Continent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Continent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Continent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Continent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Continent findOrCreate($search, callable $callback = null, $options = [])
 */
class ContinentsTable extends Table
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

        $this->setTable('continents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Countries', [
            'foreignKey' => 'continent_id',
            'targetForeignKey' => 'country_id',
            'joinTable' => 'continents_countries',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
