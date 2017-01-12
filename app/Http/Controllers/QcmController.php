<?php

namespace App\Http\Controllers;

use Auth;
use App\Score;
use App\Choice;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQcm;
use Illuminate\Support\Facades\DB;

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
        $title = $request->input('title');
        $qcm_level = $request->input('class_level');
        if($qcm_level == 'premiere') $student_level = 'first_class'; else $student_level = 'final_class';
        $qcmId = $qcm->id;
        $nbChoice = $request->input('nbChoice');

        $students = DB::table('users')
            ->select(DB::raw('users.id as users_user_id'))
            ->where('users.role', '=', $student_level)
            ->get();

        foreach ($students as $student){
            Score::create(['user_id' => $student->users_user_id, 'question_id' => $qcmId , 'status_question' => 'undone' , 'note' => 0]);
        }

        return view('admin.qcm.answer', compact('title', 'nbChoice', 'qcmId'));
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

        $nbChoice = intval($request->input('nbChoice'));

        for ($i = 0; $i < $nbChoice; $i++) {
            $i++;
            $choiceId = $request->input('choiceId' . $i);
            $choice = Choice::find($choiceId);
            $choice->content = $request->input('content' . $i);

            $choice->update();
            $i--;
        }

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studQcms()
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;
        if ($userRole = 'first_class') $userLevel = 'premiere'; else $userLevel = 'terminale';
        $title = 'Liste des QCMs';
        $scores = DB::table('scores')
            ->join('questions', 'scores.question_id', '=', 'questions.id')
            ->select(DB::raw('scores.user_id as score_user_id,
              scores.question_id as score_question_id,
             scores.status_question as score_status_question,
              scores.note as score_note,
              questions.title as question_title,
              questions.created_at as question_created_at,
              questions.class_level as question_class_level'))
            ->where('scores.user_id', '=', $userId)
            ->where('questions.class_level', '=', $userLevel)
            ->get();
        $qcms = Question::all();
        $total = [];
        $total['published'] = Question::where('status', '=', 'published')->count();
        $total['unpublished'] = Question::where('status', '=', 'unpublished')->count();
        return view('student.qcm.index', compact('qcms', 'title', 'total', 'scores'));
    }
}
