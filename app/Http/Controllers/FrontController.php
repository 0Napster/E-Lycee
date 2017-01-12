<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $postsMostCommenteds = Post::withCount('comments')->orderBy('comments_count', 'DESC')->chunk(5, function ($data) {
            return $data;
        });
        
        return view('front.index', compact('posts', 'postsMostCommenteds'));
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
