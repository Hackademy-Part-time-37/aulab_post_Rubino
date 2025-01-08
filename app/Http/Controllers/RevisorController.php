<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    public function dashboard()
    {
        
        $daRevisionare = Article::where('is_accepted', null)->get();
        $accettati = Article::where('is_accepted', true)->get();
        $rifiutati = Article::where('is_accepted', false)->get();

        
        return view('revisor.dashboard', compact('daRevisionare', 'accettati', 'rifiutati'));
    }


    public function acceptArticle(Article $article)
    {
        $article->is_accepted = true;
        $article->save();

        return redirect(route('revisor.dashboard'))->with('message', 'Articolo pubblicato');
    }

    public function rejectArticle(Article $article)
    {
        $article->is_accepted = false;
        $article->save();

        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rifiutato');
    }

    public function undoArticle(Article $article)
    {
        $article->is_accepted = null;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rimandato in revisione');
    }
}
