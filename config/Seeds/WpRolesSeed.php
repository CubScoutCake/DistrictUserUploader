<?php
use Migrations\AbstractSeed;

/**
 * WpRoles seed.
 */
class WpRolesSeed extends AbstractSeed
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
                'wp_role' => 'Leader',
            ],
            [
                'wp_role' => 'Publisher',
            ],
            [
                'wp_role' => 'Group Administrator',
            ],
            [
                'wp_role' => 'Administrator',
            ],
            [
                'wp_role' => 'Directory Administrator',
            ],
        ];

        $table = $this->table('wp_roles');
        $table->insert($data)->save();
    }
}
