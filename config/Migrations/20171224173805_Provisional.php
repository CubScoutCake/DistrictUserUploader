<?php
use Migrations\AbstractMigration;

class Provisional extends AbstractMigration
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
    	$table = $this->table('roles');

    	$table
		    ->addColumn('provisional', 'boolean', [
		    	'null' => true,
		    ])
		    ->save();

    	$table = $this->table('role_types');

    	$table
		    ->changeColumn('role_abbreviation', 'string', [
		    	'default' => null,
			    'limit' => 32,
			    'null' => true,
		    ])
		    ->save();
    }
}
