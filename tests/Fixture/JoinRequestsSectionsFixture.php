<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JoinRequestsSectionsFixture
 *
 */
class JoinRequestsSectionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'section_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'join_request_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'join_status_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'join_requests_sections_section_id' => ['type' => 'index', 'columns' => ['section_id'], 'length' => []],
            'join_requests_sections_join_request_id' => ['type' => 'index', 'columns' => ['join_request_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['section_id', 'join_request_id'], 'length' => []],
            'join_requests_sections_section_id_join_request_id' => ['type' => 'unique', 'columns' => ['section_id', 'join_request_id'], 'length' => []],
            'join_requests_sections_join_request_id' => ['type' => 'foreign', 'columns' => ['join_request_id'], 'references' => ['join_requests', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'join_requests_sections_join_status_id' => ['type' => 'foreign', 'columns' => ['join_status_id'], 'references' => ['join_statuses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'join_requests_sections_section_id' => ['type' => 'foreign', 'columns' => ['section_id'], 'references' => ['sections', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'section_id' => 1,
                'join_request_id' => 1,
                'join_status_id' => 1
            ],
        ];
        parent::init();
    }
}
