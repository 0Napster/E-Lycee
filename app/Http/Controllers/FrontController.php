<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', 'published')->paginate(5);

        $postsMostCommenteds = Post::withCount('comments')->orderBy('comments_count', 'DESC')->take(5)->get();

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
        $post = Post::findOrFail($id);
        $title = $post->name;

        $postsMostCommenteds = array();

        return view('front.show', compact('post', 'title', 'postsMostCommenteds'));
    }

    /**
     * showMentions display the detail of a post
     *
     * @param  [integer] $id [a post id]
     * @return [view]     [front.show]
     */
    public function showMentions()
    {
        $postsMostCommenteds = Post::withCount('comments')->orderBy('comments_count', 'DESC')->take(2)->get();
        return view('front.mentions', compact('postsMostCommenteds'));
    }

    /**
     * showContact display the detail of a post
     *
     * @param  [integer] $id [a post id]
     * @return [view]     [front.show]
     */
    public function showContact()
    {
        $postsMostCommenteds = Post::withCount('comments')->orderBy('comments_count', 'DESC')->take(2)->get();
        return view('front.contact', compact('postsMostCommenteds'));
    }
}
