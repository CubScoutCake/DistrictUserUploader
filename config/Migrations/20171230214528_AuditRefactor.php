<?php
use Migrations\AbstractMigration;

class AuditRefactor extends AbstractMigration
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
    	$table = $this->table('audits');

    	$table->truncate();

    	$table
		    ->addColumn('contact_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->removeColumn('audit_table')
		    ->addForeignKey('contact_id', 'contacts', ['id'])
		    ->save();
    }
}
