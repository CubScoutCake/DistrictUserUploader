<?php
use Migrations\AbstractMigration;

class RoleSectionWPIDs extends AbstractMigration
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
		    ->addColumn('wp_role_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->addIndex('wp_role_id', ['unique' => true])
		    ->save();

    	$table = $this->table('sections');

    	$table
		    ->addColumn('wp_section_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->addIndex('wp_section_id', ['unique' => true])
		    ->save();

	    $table = $this->table('roles');

	    $table
		    ->addColumn('wp_placement_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->addIndex('wp_placement_id', ['unique' => true])
		    ->save();
    }
}
