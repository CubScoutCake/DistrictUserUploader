<?php
use Migrations\AbstractMigration;

class File extends AbstractMigration
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
		    ->addColumn('file_upload','string', [
		    	'default' => null,
			    'limit' => 255,
			    'null' => false,
		    ])
		    ->addColumn('auth_user_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => true,
		    ])
		    ->addForeignKey('auth_user_id', 'auth_users', ['id'])
		    ->addTimestamps()
		    ->save();

    	$table = $this->table('compass_uploads');

    	$table
		    ->addColumn('file_upload_id', 'integer', [
		    	'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
		    ->addForeignKey('file_upload_id', 'file_uploads', ['id'])
		    ->addColumn('membership_number', 'integer', [
			    'default' => null,
			    'limit' => 11,
			    'null' => false,
		    ])
			->addColumn('title', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('forenames', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('surname', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_line1', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_line2', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_line3', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_town', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_county', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('postcode', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('address_country', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('role', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('location', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('phone', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
			->addColumn('email', 'string', [
				'default' => null,
				'limit' => 255,
				'null' => true,
			])
		    ->save();
    }
}
