<?php
use Migrations\AbstractMigration;

class FilePath extends AbstractMigration
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
    	$table = $this->table('file_uploads');

    	$table
		    ->renameColumn('file_upload', 'file_name')
		    ->addColumn('file_path', 'string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->save();
    }
}
