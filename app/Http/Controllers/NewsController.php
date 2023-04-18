<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::All();

        // dd($news);
        return view('home', compact('news'));
    }

    public function show($id)
    {
        $show = News::find($id);

        // dd($shows);

        return view('show', compact('show'));
    }
}
