<?php
use Migrations\AbstractMigration;

class SectionGroup extends AbstractMigration
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
    	$table = $this->table('sections');

    	$table
		    ->addColumn('scout_group_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addForeignKey('scout_group_id', 'scout_groups', ['id'])
		    ->save();
    }
}
