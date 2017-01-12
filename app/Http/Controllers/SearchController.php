<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getIndex(Request $request)
    {
        $postsMostCommenteds = Post::withCount('comments')->orderBy('comments_count', 'DESC')->take(4)->get();
        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->paginate(2)
            ->appends(['search' => $search]);
        $nbResult = $posts->count();

        return view('front.search', compact('posts', 'postsMostCommenteds', 'nbResult'));
    }
}
