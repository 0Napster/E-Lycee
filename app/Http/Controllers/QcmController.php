<?php

namespace App\Http\Controllers;

use Auth;
use App\Choice;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQcm;

class QcmController extends Controller
{
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
        $title = 'Liste des QCMs';
        $qcms = Question::all();
        $total = [];
        $total['published'] = Question::where('status', '=', 'published')->count();
        $total['unpublished'] = Question::where('status', '=', 'unpublished')->count();
        return view('admin.qcm.index', compact('qcms', 'title', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Ajouter un QCM";
        return view('admin.qcm.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qcm = Question::create($request->all());

        return redirect('admin/qcm')->with(['title' => 'Succès', 'message' => 'QCM créé !', 'type' => 'success']);
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
        $qcm = Question::find($id);
        $choices = Choice::all();
        $title = "Modifier le QCM";

        return view('admin.qcm.edit', compact('qcm', 'choices', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQcm $request, $id)
    {
        $qcm = Question::find($id);

        $qcm->update($request->all());

        return redirect('admin/qcm/' . $id . '/edit')->with(['title' => 'Succès', 'message' => 'QCM modifié !', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qcm = Question::find($id);
        $qcm->delete();

        return redirect('admin/post')->with(['title' => 'Succès', 'message' => 'QCM supprimé !', 'type' => 'warning']);
    }
}
