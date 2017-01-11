<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getIndex(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->paginate(2)
            ->appends(['search' => $search]);

        return view('front.search', compact('posts'));
    }
}
