<?php
use Migrations\AbstractMigration;

class UserPreferredName extends AbstractMigration
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
		    ->addColumn('preferred_name', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('validated', 'boolean', [
		    	'default' => false,
			    'null' => false
		    ])
		    ->save();
    }
}
