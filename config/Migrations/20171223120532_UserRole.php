<?php
use Migrations\AbstractMigration;

class UserRole extends AbstractMigration
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
		    ->addColumn('contact_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addForeignKey('contact_id', 'contacts', ['id'])
		    ->addIndex(['role_type_id'])
		    ->addIndex(['section_id'])
		    ->addIndex(['contact_id'])
		    ->save();
    }
}
