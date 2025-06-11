<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;

class ContentService
{
    protected $dataPath;

    public function __construct()
    {
        $this->dataPath = resource_path('data');
    }

    public function getNews($featured = null, $limit = null)
    {
        $data = $this->loadJsonFile('news.json');
        $articles = collect($data['articles'] ?? []);
        
        if ($featured !== null) {
            $articles = $articles->where('featured', $featured);
        }
        
        $articles = $articles->sortByDesc('published_at');
        
        if ($limit) {
            $articles = $articles->take($limit);
        }
        
        return $articles->values();
    }

    public function getNewsArticle($slug)
    {
        $articles = $this->getNews();
        return $articles->firstWhere('slug', $slug);
    }

    public function getAnnouncements($featured = null)
    {
        $data = $this->loadJsonFile('announcements.json');
        $announcements = collect($data['announcements'] ?? []);
        
        if ($featured !== null) {
            $announcements = $announcements->where('featured', $featured);
        }
        
        return $announcements->sortByDesc('published_at');
    }

    public function getLatestNews($limit = 3)
    {
        return $this->getNews(null, $limit);
    }

    public function getFeaturedContent()
    {
        return [
            'news' => $this->getNews(true, 2),
            'announcements' => $this->getAnnouncements(true)->first()
        ];
    }

    public function searchNews($query)
    {
        $articles = $this->getNews();
        
        return $articles->filter(function ($article) use ($query) {
            return stripos($article['title'], $query) !== false ||
                   stripos($article['content'], $query) !== false ||
                   stripos($article['excerpt'], $query) !== false;
        });
    }

    protected function loadJsonFile($filename)
    {
        $path = $this->dataPath . '/' . $filename;
        
        if (!File::exists($path)) {
            return [];
        }

        try {
            $content = File::get($path);
            return json_decode($content, true);
        } catch (\Exception $e) {
            return [];
        }
    }
}