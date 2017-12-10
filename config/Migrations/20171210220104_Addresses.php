<?php
use Migrations\AbstractMigration;

class Addresses extends AbstractMigration
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
    	$table = $this->table('contacts');

	    $table
		    ->addColumn('address_line_1', 'string', [
		        'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('address_line_2', 'string', [
		    	'default' => null,
		        'limit' => 255,
		        'null' => true,
		    ])
		    ->addColumn('city', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('county', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('postcode', 'string', [
			    'default' => null,
			    'limit' => 9,
			    'null' => true,
		    ])
		    ->addColumn('admin_group', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->save();
    }
}
