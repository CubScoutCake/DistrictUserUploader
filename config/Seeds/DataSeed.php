<?php
use Migrations\AbstractSeed;

/**
 * Data seed.
 */
class DataSeed extends AbstractSeed
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
	    $this->call('SectionTypesSeed');
	    $this->call('WpRolesSeed');
	    $this->call('AuthUsersSeed');
	    $this->call('JoinStatusesSeed');
    }
}
