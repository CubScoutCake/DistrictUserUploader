<?php
use Migrations\AbstractMigration;

class RequestLifecycle extends AbstractMigration
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
		    ->addColumn('status_type', 'integer', [
		    	'default' => 1,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->save();

    	$table = $this->table('request_traces');

    	$table
		    ->addColumn('trace_type', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->save();

    	$table = $this->table('join_requests_sections');

    	$table
		    ->addColumn('join_status_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
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
    }
}
