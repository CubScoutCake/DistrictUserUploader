<?php
use Migrations\AbstractMigration;

class JoiningEnquiry extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
    	$table = $this->table('join_statuses');

    	$table
		    ->addColumn('join_status', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addIndex(['join_status'])
		    ->save();

    	$table = $this->table('join_requests');

    	$table
		    ->addColumn('join_status_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addColumn('contact_email', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('contact_phone', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('young_person', 'boolean', [
			    'default' => true,
			    'null' => false,
		    ])
		    ->addColumn('parent_first_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('parent_last_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('young_person_first_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('young_person_last_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('date_of_birth', 'date', [
			    'null' => false,
		    ])
		    ->addTimestamps('created','modified')
		    ->addForeignKey(
			    'join_status_id',
			    'join_statuses',
			    'id',
			    [
				    'update' => 'RESTRICT',
				    'delete' => 'RESTRICT'
			    ]
		    )
		    ->save();

    	$table = $this->table('request_traces');

    	$table
		    ->addColumn('created_date', 'datetime', [
		    	'default' => null,
			    'null' => false,
		    ])
		    ->addColumn('resolved_date', 'datetime', [
		    	'default' => null,
			    'null' => false,
		    ])
		    ->addColumn('contact_hash', 'string', [
		    	'default' => null,
			    'null' => false,
		    ])
		    ->addColumn('resolver', 'string', [
		    	'default' => null,
			    'null' => true,
		    ])
		    ->save();

    	$table = $this->table('sections');

    	$table
		    ->addColumn('join_order', 'integer', [
		    	'default' => 99,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->save();

	    $table = $this->table('join_requests_sections', ['id' => false, 'primary_key' => ['section_id', 'join_request_id']]);
	    $table
		    ->addColumn('section_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addColumn('join_request_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addIndex(
			    [
				    'section_id',
			    ]
		    )
		    ->addIndex(
			    [
				    'join_request_id',
			    ]
		    )
		    ->addIndex(
			    [
				    'section_id',
				    'join_request_id',
			    ],
			    [
			    	'unique' => true,
			    ]
		    )
		    ->addForeignKey(
			    'section_id',
			    'sections',
			    'id',
			    [
				    'update' => 'RESTRICT',
				    'delete' => 'RESTRICT'
			    ]
		    )
		    ->addForeignKey(
			    'join_request_id',
			    'join_requests',
			    'id',
			    [
				    'update' => 'CASCADE',
				    'delete' => 'CASCADE'
			    ]
		    )
		    ->save();
    }
}
