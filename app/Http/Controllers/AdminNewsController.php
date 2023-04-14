<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    // Affichage de mon formulaire
    public function formAdd()
    {

        return view('adminnews.add');
    }

    // Ajout des informations
    public function add(Request $request)
    {

        // Vérification des données du formulaire
        /**
         * Titre obligatoire
         */
        $request->validate(['titre' => 'required|min:5']);
        // création d'une instance de class (model News) pour enregistrer en base .
        $newsModel = new News;

        $newsModel->titre = $request->titre;
        // Traitement de l'upload de 'image
        if ($request->file()) {
            $fileName = $request->image->store('images');
            $newsModel->image = $fileName;
        }

        // Enregistrement des données
        $newsModel->save();
    }
}
