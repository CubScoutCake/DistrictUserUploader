<?php
use Migrations\AbstractMigration;

class ScoutGroupAlias extends AbstractMigration
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
    	$table = $this->table('scout_groups');

    	$table
		    ->addColumn('group_alias', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => true,
		    ])
		    ->save();
    }
}
