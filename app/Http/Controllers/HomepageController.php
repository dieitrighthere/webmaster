<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use App\Traits\DetectsAFPNetwork;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    use DetectsAFPNetwork;
    
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    public function index(Request $request)
    {
        $featuredContent = $this->contentService->getFeaturedContent();
        $latestNews = $this->contentService->getLatestNews(4);
        
        // Debug: Let's manually check AFPNET status
        $isAFPNetwork = $request->has('afpnet') && $request->get('afpnet') === 'true';
        
        // Debug: Log what we're sending
        \Log::info('Homepage AFPNET Debug', [
            'has_afpnet_param' => $request->has('afpnet'),
            'afpnet_value' => $request->get('afpnet'),
            'isAFPNetwork' => $isAFPNetwork,
            'full_url' => $request->fullUrl(),
            'query_params' => $request->query(),
        ]);
        
        return Inertia::render('Homepage', [
            'featuredNews' => $featuredContent['news'],
            'featuredAnnouncement' => $featuredContent['announcements'],
            'latestNews' => $latestNews,
            'isAFPNetwork' => $isAFPNetwork, // Simple direct assignment for testing
            'debug' => [
                'url' => $request->fullUrl(),
                'afpnet_param' => $request->get('afpnet'),
                'has_afpnet' => $request->has('afpnet'),
            ]
        ]);
    }
}