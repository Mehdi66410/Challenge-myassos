<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Favoris Model
 *
 * @method \App\Model\Entity\Favori get($primaryKey, $options = [])
 * @method \App\Model\Entity\Favori newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Favori[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Favori|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Favori patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Favori[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Favori findOrCreate($search, callable $callback = null, $options = [])
 */
class FavorisTable extends Table
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
        $this->belongsTo('Users')->setForeignKey('id_user');
        $this->belongsTo('Films')->setForeignKey('id_film');
        $this->setTable('favoris');
        $this->setDisplayField('id_favoris');
        $this->setPrimaryKey('id_favoris');
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
            ->integer('id_favoris')
            ->allowEmpty('id_favoris', 'create');

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmpty('id_user');

        $validator
            ->integer('id_film')
            ->requirePresence('id_film', 'create')
            ->notEmpty('id_film');

        return $validator;
    }
}
