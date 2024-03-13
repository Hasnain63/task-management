<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'name' => 'Website Redesign',
                'description' => 'Redesign the company website to improve user experience and modernize the design.',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Develop a mobile application for iOS and Android platforms to extend our services to mobile users.',
            ],
            [
                'name' => 'Marketing Campaign Launch',
                'description' => 'Launch a new marketing campaign to increase brand awareness and attract new customers.',
            ],
            [
                'name' => 'Product Launch Event',
                'description' => 'Organize a product launch event to introduce our latest product to the market.',
            ],
            [
                'name' => 'E-commerce Platform Upgrade',
                'description' => 'Upgrade the existing e-commerce platform to improve performance and add new features.',
            ],
            [
                'name' => 'Content Management System Integration',
                'description' => 'Integrate a new content management system to streamline content publishing processes.',
            ],
            // Add more real projects as needed
        ];

        // Loop through each project and insert into the database
        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
