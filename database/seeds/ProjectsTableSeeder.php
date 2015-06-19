<?php
// /database/migrations/seeds/ProjectsTableSeeder.php
/**
 * Created by PhpStorm.
 * User: Lisa
 * Date: 6/5/2015
 * Time: 8:56 AM
 */

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {

    public function run()
    {
        // Wipe the table clean before populating
        DB::table('projects')->delete();

        $projects = array(
            ['id' => 1, 'name' => 'Unprogrammed Iraq Funds', 'slug' => 'unprogrammed-iraq','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Unprogrammed MENA Funds', 'slug' => 'unprogrammed-mena','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Unprogrammed SEA Funds', 'slug' => 'unprogrammed-sea','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Unprogrammed SSA Funds', 'slug' => 'unprogrammed-ssa','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Unprogrammed Pakistan Funds', 'slug' => 'unprogrammed-pakistan','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Unprogrammed SA Funds', 'slug' => 'unprogrammed-sasia','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Unprogrammed Ukraine Funds', 'slug' => 'unprogrammed-ukraine','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Unprogrammed Global Funds', 'slug' => 'unprogrammed-global','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'MENA Grant CompetitionYear 2', 'slug' => 'mena-grant-year-2','task_number' => '','unique_identifier' => '','notes'=>'', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Insert the seeds
        DB::table('projects')->insert($projects);
    }

}