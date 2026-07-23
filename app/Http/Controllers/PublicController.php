<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\information;
use App\Models\InformationCategory;
use App\Models\Regulation;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $information_categories = InformationCategory::all();

        $information = information::with('category')->get();

        $regulation = Regulation::all();

        $faq = Faq::all();

        return view('index', compact('information_categories', 'information', 'regulation', 'faq'));
    }
}
