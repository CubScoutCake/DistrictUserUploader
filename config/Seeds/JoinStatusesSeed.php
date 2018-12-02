<?php
use Migrations\AbstractSeed;

/**
 * JoinStatuses seed.
 */
class JoinStatusesSeed extends AbstractSeed
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
                'join_status' => 'Received',
                'status_type' => 1,
            ],
            [
                'join_status' => 'Validated',
                'status_type' => 1,
            ],
            [
                'join_status' => 'Assigned',
                'status_type' => 1,
            ],
            [
                'join_status' => 'Completed',
                'status_type' => 1,
            ],
            [
                'join_status' => 'Pending Section',
                'status_type' => 2,
            ],
            [
                'join_status' => 'Section Notified',
                'status_type' => 2,
            ],
            [
                'join_status' => 'Assigned to Section',
                'status_type' => 2,
            ],
            [
                'join_status' => 'Fallback Section',
                'status_type' => 2,
            ],
        ];

        $table = $this->table('join_statuses');
        $table->insert($data)->save();
    }
}
