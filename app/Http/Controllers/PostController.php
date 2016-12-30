<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

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
        $title                = 'Liste des articles';
        $posts                = Post::all();
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
        $userId     = Auth::user()->id;
        return view('admin.post.create',compact('title','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post   = Post::create($request->all());

        return redirect('admin/post')->with(['title' => 'Succés', 'message' => 'Post créer !', 'type' => 'succes']);
//        return dd($request->all());
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
