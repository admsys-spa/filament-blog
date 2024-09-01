<?php

namespace Admsys\FilamentBlog\Http\Controllers;

use Admsys\FilamentBlog\Models\Category;
use Admsys\FilamentBlog\Models\Tag;

class TagController extends Controller
{
    public function posts(Tag $tag)
    {
        $posts = $tag->load(['posts.user'])
            ->posts()
            ->published()
            ->paginate(25);

        return view('filament-blog::blogs.tag-post', [
            'posts' => $posts,
            'tag' => $tag,
        ]);
    }
}
