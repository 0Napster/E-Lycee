<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return view('front.index', compact('posts'));
    }

    /**
     * showPost display the detail of a post
     *
     * @param  [integer] $id [a post id]
     * @return [view]     [front.show]
     */
    public function showPost($id)
    {
        $post       = Post::findOrFail($id);
        $title      = $post->name;

        return view('front.show', compact('post', 'title'));
    }
}
