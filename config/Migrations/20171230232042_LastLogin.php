<?php
use Migrations\AbstractMigration;

class LastLogin extends AbstractMigration
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
		    ->addColumn('last_login', 'datetime', [
		    	'default' => null,
			    'null' => true,
		    ])
		    ->save();
    }
}
