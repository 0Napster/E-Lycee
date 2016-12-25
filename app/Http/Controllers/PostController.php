<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * $paginate (10 posts by pages)
     *
     * @var integer
     */
    private $paginate = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts                = Post::with('category', 'user', 'tags')
            ->OrderByPublished()
            ->OrderByScore()
            ->paginate($this->paginate);
        $title                = 'Liste des articles';
        $total                = [];
        $total['published']   = Post::where('status','=','published')->count();
        $total['unpublished'] = Post::where('status','=','unpublished')->count();
        return view('admin.post.index',compact('posts','title','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = "Ajouter un article";
        $categories = Category::lists('title', 'id');
        $tags       = Tag::lists('name','id');
        $userId     = Auth::user()->id;
        return view('admin.post.create',compact('title','categories','tags','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
