<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsStandardController extends Controller
{
    //
    public function standard()
    {
        $actus = News::orderBy('updated_at', 'DESC')->paginate(5);
        $categories = Category::orderBy('name', 'ASC')->get();

        return View('news.standard', compact(
            'actus',
            'categories'
        ));
    }

    public function detail(News $actu)
    {
        // 
        

        return View('news.standardDetail', compact('actu'));
    }
}
