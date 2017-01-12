<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreComment $request)
    {
        Comment::create($request->all());
        $post_id = $request->input('post_id');
        return redirect('article/' . $post_id)->with('messageFront', 'Votre commentaire a bien été enregistré !');
    }
}
