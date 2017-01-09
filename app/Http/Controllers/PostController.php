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
    private $paginate = 5;
    protected $dateFormat = 'DD/MM/YYYY';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Liste des articles';
        $posts = Post::all();
        $total = [];
        $total['published'] = Post::where('status', '=', 'published')->count();
        $total['unpublished'] = Post::where('status', '=', 'unpublished')->count();
        return view('admin.post.index', compact('posts', 'title', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Ajouter un article";
        $userId = Auth::user()->id;
        return view('admin.post.create', compact('title', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {

        $post = Post::create($request->all());

        return redirect('admin/post')->with(['title' => 'Succès', 'message' => 'Post créé !', 'type' => 'success']);
//      return dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $title = "Modifier l'article";
        $userId = Auth::user()->id;

        return view('admin.post.edit', compact('post', 'title', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return redirect('admin/post/' . $id . '/edit')->with(['title' => 'Succès', 'message' => 'Post modifié !', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}