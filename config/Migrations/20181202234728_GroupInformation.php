<?php
use Migrations\AbstractMigration;

class GroupInformation extends AbstractMigration
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
		    ->addColumn('charity_number', 'integer', [
		    	'null' => true,
			    'default' => 'null'
		    ])
		    ->addColumn('group_domain', 'string', [
		    	'default' => 'null',
			    'null' => true,
		    ]);
    }
}
