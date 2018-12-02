<?php
use Migrations\AbstractMigration;

class JoinSectionOrder extends AbstractMigration
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
    	$this->table('join_requests_sections')
		    ->addColumn('section_order', 'integer', [
		    	'default' => 1,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->save();
    }
}
