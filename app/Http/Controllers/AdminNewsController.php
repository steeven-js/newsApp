<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    /**
     * Listing
     */
    public function index(Request $request)
    {
        $news = News::orderBy('updated_at', 'DESC')->paginate(5);

        return view('adminList', compact('news'));
    }

    /**
     * Ajout
     */
    // Afficher le formulaire
    public function formAdd()
    {

        $categories = Category::orderBy('name', 'asc')->get();

        return view('adminnews.edit', compact(
            'categories'
        ));
    }

    // Créer la news
    public function add(Request $request)
    {

        // Vérification des données du formulaire
        /**
         * Titre obligatoire
         */
        $request->validate(['titre' => 'required|min:5']);
        // création d'une instance de class (model News) pour enregistrer en base .
        $newsModel = new News;

        // Traitement de l'upload de 'image
        if ($request->file()) {
            $fileName = $request->image->store('public/images');
            $newsModel->image = $fileName;
        }

        $newsModel->description = $request->description;

        $newsModel->category_id = $request->category;

        $newsModel->titre = $request->titre;

        // dd($newsModel);
        // Enregistrement des données
        $newsModel->save();

        return Redirect::route('news.add');
    }

    public function show($id)
    {
        $onenews = News::find($id);

        // dd($oneNews);

        return view('adminShow', compact('onenews'));
    }

    /**
     * Edition
     */
    // Afficher le formulaire de modification
    public function formEdit($id)
    {
        $actu = News::findOrFail($id);

        $categories = Category::orderBy('name', 'asc')->get();

        // dd($categories);

        return view('adminnews.edit', compact(
            'actu',
            'categories'
        ));
    }
    // Enregistrer le modification
    public function edit(Request $request, $id)
    {
        $actu = News::findOrFail($id);

        $request->validate(['titre' => 'required|min:5']);

        $actu->description = $request->description;

        $actu->category_id = $request->category;

        $actu->titre = $request->titre;

        // Traitement de l'upload de 'image
        if ($request->file()) {

            if ($actu->image != '') {
                Storage::delete($actu->image);
            }

            $fileName = $request->image->store('public/images');
            $actu->image = $fileName;
        }
        
        $actu->save();
        return Redirect::route('adminList');
    }

    /**
     * Supression
     */

    public function delete($id = 0)
    {

        $news = News::findOrFail($id);

        if ($news->image != '') { //Vérifie si l'image existe en db

            Storage::delete($news->image);
        }

        $news->delete();

        return redirect(route('adminList'));
    }
}
