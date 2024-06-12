<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        $projects = [

            [
                'title' => 'Boolfix',
                'link' => 'https://github.com/Vincenzo-23/vite-boolflix',
                'description' => 'Rivisitazione della famosa piattaforma streaming Netflix',

            ],
            [
                'title' => 'Boolando',
                'link' => 'https://github.com/Vincenzo-23/vite-boolando',
                'description' => 'Rivisitazione dell\'e-commerce Zalando',

            ],
            [
                'title' => 'Boolzapp',
                'link' => 'https://github.com/Vincenzo-23/vue-boolzapp',
                'description' => 'Rivisitazione dell\'app di messaggistica Whatsapp',

            ]


        ];


        foreach ($projects as $project) {
            $new_project = new Project();

            $new_project->title = $project['title'];
            $new_project->link = $project['link'];
            $new_project->description = $project['description'];

            $new_project->save();
        }

        
    }
}
