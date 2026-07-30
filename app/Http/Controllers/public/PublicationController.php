<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    public function index()
    {
        $featuredNews = collect([]);
        return view('public.publication.index', compact('featuredNews'));
    }

    public function news()
    {
        $news = collect([]);
        return view('public.publication.news', compact('news'));
    }

    public function detail($slug)
    {
        $item = null;
        return view('public.publication.news-detail', compact('item'));
    }

    public function publication()
    {
        $reports = collect([]);
        return view('public.publication.publication', compact('reports'));
    }

    public function document()
    {
        $documents = collect([]);
        return view('public.publication.document', compact('documents'));
    }

    public function procurement()
    {
        $packages = collect([]); 
        return view('public.publication.procurement', compact('packages'));
    }
}
