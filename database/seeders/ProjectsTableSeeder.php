<?php

namespace Database\Seeders;

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
        $project = new Project([
            'title' => 'My Cars',
            'oneline' => 'A free, online car care app',
            'description' => 'My Cars',
            'link' => 'https://mycars.wyattjohnson.net',
        ]);
        $project->save();
        for($i = 0; $i <= 8; $i++) {
            $project = new Project([
                'title' => 'Test ' . $i,
                'oneline' => 'Test Oneline ' . $i,
                'description' => 'Test Description ' . $i,
                'link' => '#page-top'
            ]);
            $project->save();
        }
    }
}
