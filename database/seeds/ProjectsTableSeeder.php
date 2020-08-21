<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 35; $i++) {
            $project = new Project([
                'title' => 'Test ' . $i,
                'description' => 'Test Description ' . $i,
                'link' => '#page-top'
            ]);
            $project->save();
        }
    }
}
