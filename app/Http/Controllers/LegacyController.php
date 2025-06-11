<?php

namespace App\Http\Controllers;

use App\Traits\DetectsAFPNetwork;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LegacyController extends Controller
{
    use DetectsAFPNetwork; // Only include if this page needs AFPNET detection
    
    public function index(Request $request)
    {
        return Inertia::render('Legacy', [
            'history' => $this->getHistoryData(),
            'achievements' => $this->getAchievements(),
            'timeline' => $this->getTimeline(),
            ...$this->getAFPNetworkStatus($request), // Only include if needed
        ]);
    }

    private function getHistoryData()
    {
        return [
            'founding' => '1946',
            'mission' => 'To provide strategic intelligence support to the Armed Forces of the Philippines and contribute to national security.',
            'vision' => 'A world-class intelligence service committed to protecting the sovereignty and security of the Republic of the Philippines.',
            'description' => 'The Intelligence Service of the Armed Forces of the Philippines has served as the premier military intelligence organization since its establishment. Through decades of dedicated service, we have evolved to meet the changing security challenges facing our nation.'
        ];
    }

    private function getAchievements()
    {
        return [
            [
                'year' => '2020-2024',
                'title' => 'Modernization Program',
                'description' => 'Successfully implemented comprehensive modernization of intelligence capabilities and systems.'
            ],
            [
                'year' => '2015-2020',
                'title' => 'Counter-Terrorism Operations',
                'description' => 'Significant contributions to national counter-terrorism efforts and regional security cooperation.'
            ],
            [
                'year' => '2010-2015',
                'title' => 'Technology Integration',
                'description' => 'Advanced integration of modern technology and analytical capabilities.'
            ]
        ];
    }

    private function getTimeline()
    {
        return [
            ['year' => '1946', 'event' => 'Establishment of military intelligence services'],
            ['year' => '1972', 'event' => 'Reorganization and expansion of capabilities'],
            ['year' => '1986', 'event' => 'Democratic transition and institutional reforms'],
            ['year' => '2000', 'event' => 'Technology modernization initiatives'],
            ['year' => '2010', 'event' => 'Enhanced regional cooperation programs'],
            ['year' => '2020', 'event' => 'Comprehensive modernization program launch']
        ];
    }
}