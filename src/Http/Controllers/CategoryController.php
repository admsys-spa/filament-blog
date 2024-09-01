<?php

namespace Admsys\FilamentBlog\Http\Controllers;

use Admsys\FilamentBlog\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Request $request, Category $category)
    {
        $posts = $category->load(['posts.user', 'posts.categories'])
            ->posts()
            ->published()
            ->paginate(25);

        return view('filament-blog::blogs.category-post', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }
}
