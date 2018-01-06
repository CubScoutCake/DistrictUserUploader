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

    /**
     * Test match terms method
     *
     * @return void
     */
    public function testMatchTerms()
    {
        // Beavers

        $goodArray = [
            'group' => '4th Letchworth',
            'section' => 'Beaver Scout 1'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('Beavers', $sectionType->section_type);

        // Cubs

        $goodArray = [
            'group' => '4th Letchworth',
            'section' => 'Cub Scout 1'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('Cubs', $sectionType->section_type);

        // Scouts

        $goodArray = [
            'group' => '4th Letchworth',
            'section' => 'Scout 1'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('Scouts', $sectionType->section_type);

        // Explorers

        $goodArray = [
            'group' => '4th Letchworth',
            'section' => 'Explorer Scout 1'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('Explorers', $sectionType->section_type);

        // Group

        $goodArray = [
            'group' => '4th Letchworth',
            'section' => '4th Letchworth'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('Group', $sectionType->section_type);

        // District

        $goodArray = [
            'group' => 'New District',
            'section' => 'New District'
        ];

        $response = $this->SectionTypes->matchTerms($goodArray);
        $this->assertTrue(is_numeric($response));
        $sectionType = $this->SectionTypes->get($response);
        $this->assertTextEquals('District', $sectionType->section_type);

        // False

        $response = $this->SectionTypes->matchTerms([]);
        $this->assertFalse($response);

        // Malformed Array

        $badArray = [
            'grp' => '5th Letchworth',
            'section' => 'Cub Scout 1'
        ];

        $response = $this->SectionTypes->matchTerms($badArray);
        $this->assertFalse($response);

        // Test Empty Section
        $badArray = [
            'group' => '5th Letchworth',
            'section' => null
        ];

        $response = $this->SectionTypes->matchTerms($badArray);
        $this->assertFalse($response);
    }
}
