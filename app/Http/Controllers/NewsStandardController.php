<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsStandardController extends Controller
{
    //
    public function standard($id = 0)
    {
        // Si id != 0 on liste par catégories sinon on liste tout.
        if ($id != 0) {
            // Afficher les news de la catégorie par date de création
            $actus = News::where('category_id', $id)->orderBy('updated_at', 'desc')->paginate(10);
        } else {
            $actus = News::orderBy('updated_at', 'desc')->paginate(10);
        }
        $categories = Category::orderBy('name', 'ASC')->get();

        return View('news.category', compact(
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
