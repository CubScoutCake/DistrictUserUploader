<?php
use Migrations\AbstractMigration;

class InitialBuild extends AbstractMigration
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
		    ->addColumn('username', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('first_name', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('last_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('email', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('password', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addTimestamps('created','modified')
		    ->addIndex(
			    ['username'],
			    ['unique' => true]
		    )
		    ->addIndex(
			    ['email'],
			    ['unique' => true]
		    )
		    ->save();

    	$table = $this->table('wp_roles');

    	$table
		    ->addColumn('wp_role', 'string', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addTimestamps('created','modified')
		    ->addIndex(
			    ['wp_role'],
			    ['unique' => true]
		    )
		    ->save();


    	$table = $this->table('contacts');

    	$table
		    ->addColumn('wp_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addColumn('mc_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addColumn('membership_number', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addColumn('first_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('last_name', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('email', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('wp_role_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addTimestamps('created','modified')
		    ->addIndex(
			    ['wp_id'],
			    ['unique' => true]
		    )
		    ->addIndex(
			    ['mc_id'],
			    ['unique' => true]
		    )
		    ->addIndex(
			    ['membership_number'],
			    ['unique' => true]
		    )
		    ->addIndex(
			    ['email'],
			    ['unique' => true]
		    )
		    ->addForeignKey('wp_role_id','wp_roles')
		    ->save();

	    $table = $this->table('scout_groups');

	    $table
		    ->addColumn('scout_group', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('number_stripped', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->addTimestamps('created','modified')
		    ->addIndex(
			    ['scout_group'],
			    ['unique' => true]
		    )
		    ->save();

	    $table = $this->table('section_types');

	    $table
		    ->addColumn('section_type', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addIndex(
			    ['section_type'],
			    ['unique' => true]
		    )
		    ->save();

	    $table = $this->table('sections');

	    $table
		    ->addColumn('section', 'string', [
			    'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('section_type_id', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addTimestamps('created','modified')
		    ->addIndex(
			    ['section'],
			    ['unique' => true]
		    )
		    ->addForeignKey('section_type_id','section_types')
		    ->save();
    }
}
