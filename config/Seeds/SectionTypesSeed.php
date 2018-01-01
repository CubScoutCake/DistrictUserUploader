<?php
use Migrations\AbstractSeed;

/**
 * SectionTypes seed.
 */
class SectionTypesSeed extends AbstractSeed
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
                'section_type' => 'Group',
            ],
            [
                'section_type' => 'District',
            ],
            [
                'section_type' => 'Beavers',
            ],
            [
                'section_type' => 'Cubs',
            ],
            [
                'section_type' => 'Scouts',
            ],
            [
                'section_type' => 'Explorers',
            ],
            [
                'section_type' => 'Network',
            ],
        ];

        $table = $this->table('section_types');
        $table->insert($data)->save();
    }
}
