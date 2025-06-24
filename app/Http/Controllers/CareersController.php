<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CareersController extends Controller
{
    // No DetectsAFPNetwork trait - this page doesn't need AFPNET detection
    
    public function index()
    {
        return Inertia::render('Careers', [
            'careers' => $this->getCareersData(),
            // No isAFPNetwork - this page is public
        ]);
    }

    private function getCareersData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Intelligence Analyst',
                'department' => 'Operations Division',
                'location' => 'Camp Aguinaldo, Quezon City',
                'type' => 'Full-time',
                'description' => 'Seeking qualified intelligence analysts to join our operations team.',
                'requirements' => [
                    'Bachelor\'s degree in relevant field',
                    'Strong analytical skills',
                    'Security clearance eligible',
                    'Filipino citizenship required'
                ],
                'posted_at' => '2024-06-01'
            ],
            [
                'id' => 2,
                'title' => 'Cybersecurity Specialist',
                'department' => 'Technology Division',
                'location' => 'Camp Aguinaldo, Quezon City',
                'type' => 'Full-time',
                'description' => 'Join our cybersecurity team to protect national infrastructure.',
                'requirements' => [
                    'Bachelor\'s degree in Computer Science or related field',
                    'Cybersecurity certifications preferred',
                    'Experience in network security',
                    'Filipino citizenship required'
                ],
                'posted_at' => '2024-05-28'
            ]
        ];
    }
}