<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Utility\Inflector;

/**
 * App\Model\Table\SectionTypesTable Test Case
 */
class SectionTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionTypesTable
     */
    public $SectionTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.section_types',
        'app.sections',
        'app.scout_groups',
        'app.contacts',
        'app.wp_roles',
        'app.roles',
        'app.role_types',
        'app.audits',
        'app.auth_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SectionTypes') ? [] : ['className' => SectionTypesTable::class];
        $this->SectionTypes = TableRegistry::get('SectionTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SectionTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findOrMakeSectionType method
     *
     * @return void
     */
    public function testFindOrMakeSectionType()
    {
        $stringData = 'cub';
        $response = $this->SectionTypes->findOrMakeSectionType($stringData);

        $this->assertNotFalse($response);

        $stringData = Inflector::pluralize(ucwords($stringData));
        $this->assertTextEquals($stringData, $response->section_type);

        $response = $this->SectionTypes->findOrMakeSectionType('');
        $this->assertFalse($response);
    }
}
