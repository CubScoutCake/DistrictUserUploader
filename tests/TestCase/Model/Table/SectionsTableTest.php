<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionsTable Test Case
 */
class SectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionsTable
     */
    public $Sections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sections',
        'app.section_types',
        'app.contacts',
        'app.wp_roles',
        'app.scout_groups',
        'app.roles',
        'app.role_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sections') ? [] : ['className' => SectionsTable::class];
        $this->Sections = TableRegistry::get('Sections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sections);

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
     * Test findOrMakeSection method
     *
     * @return void
     */
    public function testFindOrMakeSection()
    {
        // Test Success
        $goodArray = [
            'group' => '4th Letchworth',
            'section' => 'Cub Scout 1'
        ];

        $response = $this->Sections->findOrMakeSection($goodArray);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);

        // Test Array Malformation
        $badArray = [
            'grp' => '5th Letchworth',
            'section' => 'Cub Scout 1'
        ];

        $response = $this->Sections->findOrMakeSection($badArray);
        $this->assertFalse($response);

        // Test Empty Section
        $badArray = [
            'group' => '5th Letchworth',
            'section' => null
        ];

        $response = $this->Sections->findOrMakeSection($badArray);
        $this->assertFalse($response);
    }

    /**
     * Test Duplicate Placeholder Array
     */
    public function testDuplicatePlaceHolder()
    {
        $data = [
            'scout_group_id' => 1,
            'section_type_id' => 1,
            'section' => 'Cub Scout 1'
        ];

        $newEnt = $this->Sections->newEntity($data);
        $this->assertInstanceOf('\Cake\ORM\Entity', $newEnt);

        $newEnt = $this->Sections->save($newEnt);
        $this->assertInstanceOf('\Cake\ORM\Entity', $newEnt);

        $retrieved = $this->Sections->get($newEnt->id);
        $this->assertInstanceOf('\Cake\ORM\Entity', $retrieved);

        $this->assertTextEquals('Lorem Ipsum - Cubs', $retrieved->section);

        $data = [
            'scout_group_id' => 1,
            'section_type_id' => 1,
            'section' => 'Scout 1'
        ];

        $newEnt = $this->Sections->newEntity($data);
        $this->assertInstanceOf('\Cake\ORM\Entity', $newEnt);

        $newEnt = $this->Sections->save($newEnt);
        $this->assertInstanceOf('\Cake\ORM\Entity', $newEnt);

        $retrieved = $this->Sections->get($newEnt->id);
        $this->assertInstanceOf('\Cake\ORM\Entity', $retrieved);

        $this->assertTextEquals('Lorem Ipsum - Scouts', $retrieved->section);
    }

    /**
     * Test findOrMakeSection method
     *
     * @return void
     */
    public function testFindOrMakeDistrictSection()
    {
        // Test Success
        $goodArray = [
            'group' => 'Letchworth And Baldock',
            'section' => 'District'
        ];

        $response = $this->Sections->findOrMakeSection($goodArray);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);
    }
}
