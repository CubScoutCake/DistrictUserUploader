<?php
use Migrations\AbstractMigration;

class API extends AbstractMigration
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
    	$table = $this->table('auth_users');
    	$table
		    ->addColumn('api_key_plain', 'string',
			    [
			    	'limit' => 255,
				    'default' => null,
				    'null' => true,
			    ])
		    ->addColumn('api_key', 'string',
			    [
			    	'limit' => 255,
				    'default' => null,
				    'null' => true,
			    ])
		    ->save();
    }
}
