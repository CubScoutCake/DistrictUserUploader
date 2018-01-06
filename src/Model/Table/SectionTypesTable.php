<?php
namespace App\Model\Table;

use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Validation\Validator;

/**
 * SectionTypes Model
 *
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\HasMany $Sections
 *
 * @method \App\Model\Entity\SectionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SectionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SectionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SectionType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SectionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SectionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SectionType findOrCreate($search, callable $callback = null, $options = [])
 */
class SectionTypesTable extends Table
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

        $this->setTable('section_types');
        $this->setDisplayField('section_type');
        $this->setPrimaryKey('id');

        $this->hasMany('Sections', [
            'foreignKey' => 'section_type_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('section_type')
            ->maxLength('section_type', 255)
            ->requirePresence('section_type', 'create')
            ->notEmpty('section_type')
            ->add('section_type', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['section_type']));

        return $rules;
    }

    /**
     * Find Or Make SectionType
     *
     * @param string $sectionType The Section Type to be made
     *
     * @return \App\Model\Entity\SectionType|bool
     */
    public function findOrMakeSectionType($sectionType)
    {
        if (!isset($sectionType) || empty($sectionType)) {
            return false;
        }

        $sectionType = Inflector::pluralize($sectionType);
        $sectionType = ucwords($sectionType);

        $sectionTypeEnt = $this->findOrCreate(['section_type' => $sectionType]);

        if ($sectionTypeEnt instanceof Entity) {
            return $sectionTypeEnt;
        }

        return false;
    }

    /**
     * @param array $sectionTypeArr An array containing Group & Section Names
     *
     * @return int|bool The ID of the SectionType or false
     */
    public function matchTerms($sectionTypeArr)
    {
        if (!isset($sectionTypeArr['group']) || !isset($sectionTypeArr['section'])) {
            return false;
        }

        $terms = explode(' ', $sectionTypeArr['section']);

        $termMatch = 0;
        $scoutMatch = 0;

        $types = $this->find('all')->where(function ($exp, $q) {
            return $exp->notIn('section_type', ['District', 'Group']);
        })->toArray();

        foreach ($types as $type) {
            $sectionType = strtoupper(Inflector::singularize($type->section_type));
            foreach ($terms as $pos => $term) {
                $terms[$pos] = strtoupper(Inflector::singularize($term));
            }

            if (in_array($sectionType, $terms)) {
                $termMatch += 1;
                if ($sectionType == 'SCOUT') {
                    $scoutMatch += 1;
                    $scoutId = $type->id;
                } else {
                    $termId = $type->id;
                }
            }
        }

        if (($termMatch - $scoutMatch) == 1 && isset($termId)) {
            $typeId = $termId;
        } elseif ($scoutMatch == 1 && isset($scoutId)) {
            $typeId = $scoutId;
        }

        if (!isset($typeId)) {
            $groupTerms = explode(' ', $sectionTypeArr['group']);
            $districtMatch = 0;
            foreach ($groupTerms as $key => $grpTerm) {
                $groupTerms[$key] = Inflector::singularize(strtolower($grpTerm));
            }

            if (in_array('district', $groupTerms)) {
                $districtMatch += 1;
            } elseif (in_array('and', $groupTerms)) {
                $districtMatch += 1;
            }

            if ($districtMatch > 0) {
                $typeId = $this->findOrCreate(['section_type' => 'District'])->id;
            } else {
                $typeId = $this->findOrCreate(['section_type' => 'Group'])->id;
            }
        }

        return $typeId;
    }
}
