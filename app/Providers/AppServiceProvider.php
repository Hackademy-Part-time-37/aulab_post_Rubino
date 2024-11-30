<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share('categories', $categories);
        }
        if (Schema::hasTable('tags')) {
            $tags = Tag::all();
            View::share(['tags' => $tags]);
        }
    }

    public function register(): void
    {
        //
    }
}