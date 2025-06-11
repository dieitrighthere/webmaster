<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display newsroom page
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        if ($search) {
            $articles = $this->contentService->searchNews($search);
        } else {
            $articles = $this->contentService->getNews();
        }
        
        return Inertia::render('Newsroom', [
            'articles' => $articles,
            'search' => $search,
        ]);
    }

    /**
     * Display single news article
     */
    public function show($slug)
    {
        $article = $this->contentService->getNewsArticle($slug);
        
        if (!$article) {
            abort(404);
        }

        // Get related articles (same category, excluding current)
        $relatedArticles = $this->contentService->getNews()
            ->where('category', $article['category'])
            ->where('id', '!=', $article['id'])
            ->take(3);
        
        return Inertia::render('NewsArticle', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }
}