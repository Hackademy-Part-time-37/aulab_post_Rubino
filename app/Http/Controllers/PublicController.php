<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class PublicController extends Controller implements HasMiddleware
{
    /**
     * Middleware configuration for the controller
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['homepage']),
        ];
    }

    /**
     * Show the homepage with recent articles
     *
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
    return view('welcome', compact('articles'));
    }

    /**
     * Show the careers page
     *
     * @return \Illuminate\View\View
     */
    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
{
    $request->validate([
        'role' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $user = Auth::user();
    $role = $request->role;
    $email = $request->email;
    $message = $request->message;

    $info = compact('role', 'email', 'message');

    Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail($info));

    switch ($role) {
        case 'admin':
            $user->is_admin = NULL;
            break;
        case 'revisor':
            $user->is_revisor = NULL;
            break;
        case 'writer':
            $user->is_writer = NULL;
            break;
    }

    $user->update();

    return redirect(route('homepage'))->with('message', 'Mail inviata con successo!');
}


}