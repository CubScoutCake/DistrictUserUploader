<?php
use Migrations\AbstractSeed;

/**
 * AuthUsers seed.
 */
class AuthUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'Jacob',
                'first_name' => 'Jacob',
                'last_name' => 'Tyler',
                'email' => 'jacob@4thletchworth.com',
                'password' => '',
            ],
	        [
		        'username' => 'WordPress',
		        'first_name' => 'WordPress',
		        'last_name' => 'Site',
		        'email' => 'webmaster@lbdscouts.org.uk',
		        'password' => '',
	        ],
        ];

        $table = $this->table('auth_users');
        $table->insert($data)->save();
    }
}
