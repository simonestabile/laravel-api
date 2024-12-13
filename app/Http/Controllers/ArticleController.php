<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Ottieni tutti gli articoli
    public function index()
    {
        return Article::all();
    }

    // Crea un nuovo articolo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($article, 201);
    }

    // Ottieni un articolo specifico
    public function show($id)
    {
        return Article::findOrFail($id);
    }

    // Aggiorna un articolo
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($article);
    }

    // Elimina un articolo
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(null, 204);
    }
}
