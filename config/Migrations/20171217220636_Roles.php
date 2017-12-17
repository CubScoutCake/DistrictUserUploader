<?php
use Migrations\AbstractMigration;

class Roles extends AbstractMigration
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
	    $table = $this->table('role_types');

	    $table
		    ->addColumn('role_type', 'string', [
		    	'default' => null,
			    'limit' => '255',
			    'null' => false,
		    ])
		    ->addColumn('role_abbreviation', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('section_type_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->save();


    	$table = $this->table('roles');

    	$table
		    ->addColumn('role_type_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addForeignKey('role_type_id', 'role_types', ['id'])
		    ->addColumn('section_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addForeignKey('section_id', 'sections', ['id'])
		    ->save();

    	$table = $this->table('contacts');

    	$table
		    ->renameColumn('admin_group', 'admin_scout_group_id')
		    ->addForeignKey('admin_scout_group_id', 'scout_groups', ['id'])
		    ->save();
    }
}
