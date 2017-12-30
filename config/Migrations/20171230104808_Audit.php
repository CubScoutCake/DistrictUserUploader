<?php
use Migrations\AbstractMigration;

class Audit extends AbstractMigration
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
		    ->addTimestamps()
		    ->addColumn('last_login', 'datetime', [
		    	'default' => null,
			    'null' => true,
		    ])
		    ->save();

    	$table = $this->table('audits');

    	$table
		    ->addColumn('audit_field', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('audit_table', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('original_value', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addColumn('modified_value', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('auth_user_id', 'integer', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->addForeignKey('auth_user_id', 'auth_users', ['id'])
		    ->addColumn('change_date', 'datetime')
		    ->save();
    }
}
