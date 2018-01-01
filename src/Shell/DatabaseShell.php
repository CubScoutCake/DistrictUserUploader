<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 11/12/2016
 * Time: 19:04
 */
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Migrations\Migrations;

class DatabaseShell extends Shell
{
    /**
     * Function to build the database via migrations.
     *
     * @return void
     */
    public function build()
    {
        $migrations = new Migrations();

        $migrate = $migrations->migrate();
        if (!$migrate) {
            $this->out('Database Migration Implementation Failed.');

            return;
        }
        $this->out('Database Migration Implementation Succeeded.');
    }

    /**
     * Function to add basic config data to the database.
     *
     * @return void
     */
    public function seed()
    {
        $migrations = new Migrations();

        $seeded = $migrations->seed(['seed' => 'DataSeed']);
        if (!$seeded) {
            $this->out('Seeding Failed.');

            return;
        }
        $this->out('Seeding Succeeded.');
    }

    /**
     * Hashes the password for the inital user with the installed Hash.
     *
     * @return void
     */
    public function password()
    {
        $users = TableRegistry::get('AuthUsers');

        $default = $users->findByUsername('Jacob')->first();
        $default->set('password', 'TestMe');

        if (!$users->save($default)) {
            $this->out('Default User Password Reset Failed.');

            return;
        }

        $wordpress = $users->findByUsername('WordPress')->first();
        $wordpress->set('password', Security::randomBytes(32));

        if (!$users->save($wordpress)) {
            $this->out('WordPress User Password Reset Failed.');

            return;
        }
        $this->out('User Password Reset Succeeded.');
    }
}
