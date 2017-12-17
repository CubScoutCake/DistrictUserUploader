<?php
use Migrations\AbstractMigration;

class WpGroup extends AbstractMigration
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
		    ->addColumn('wp_group_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->save();
    }
}
