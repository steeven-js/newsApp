<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NewsStandardController extends Controller
{
    //
    public function index()
    {
        $actus = News::orderBy('updated_at', 'DESC')->paginate(5);

        return View('news.standard', compact('actus'));
    }

    public function detail(News $actu)
    {
        // 
        

        return View('news.standardDetail', compact('actu'));
    }
}
