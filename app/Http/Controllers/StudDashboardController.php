<?php

namespace App\Http\Controllers;

use App\Score;
use Auth;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;
        if ($userRole == 'final_class') $userLevel = 'terminale'; else $userLevel = 'premiere';
        $scores = DB::table('scores')
            ->join('questions', 'scores.question_id', '=', 'questions.id')
            ->select(DB::raw('scores.user_id as score_user_id,
              scores.question_id as score_question_id,
              scores.status_question as score_status_question,
              scores.note as score_note,
              scores.updated_at as score_updated_at,
              questions.title as question_title,
              questions.status as question_status,
              questions.updated_at as question_updated_at,
              questions.class_level as question_class_level'))
            ->where('scores.user_id', '=', $userId)
            ->where('questions.class_level', '=', $userLevel)
            ->where('questions.status', '=', 'published')
            ->get();
        $qcmWaiting = $scores->where('score_status_question', '=', 'undone')->count();


        $totalQcms = Question::all()->count();
        $title = 'Dashboard';
        return view('student.dashboard', compact('title', 'scores' , 'qcmWaiting'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudQcms()
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;
        if ($userRole == 'final_class') $userLevel = 'terminale'; else $userLevel = 'premiere';
        $title = 'Liste des QCMs';
        $scores = DB::table('scores')
            ->join('questions', 'scores.question_id', '=', 'questions.id')
            ->select(DB::raw('scores.user_id as score_user_id,
              scores.question_id as score_question_id,
              scores.status_question as score_status_question,
              scores.note as score_note,
              scores.updated_at as score_updated_at,
              questions.title as question_title,
              questions.status as question_status,
              questions.updated_at as question_updated_at,
              questions.class_level as question_class_level'))
            ->where('scores.user_id', '=', $userId)
            ->where('questions.class_level', '=', $userLevel)
            ->where('questions.status', '=', 'published')
            ->get();
        $qcmWaiting = $scores->where('score_status_question', '=', 'undone')->count();
        $qcms = Question::all();
        return view('student.qcm.index', compact('qcms', 'title', 'scores', 'qcmWaiting'));
    }

    /**
     * Show the form for answering to a qcm.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer($id)
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;
        if ($userRole == 'final_class') $userLevel = 'terminale'; else $userLevel = 'premiere';
        $scores = DB::table('scores')
            ->join('questions', 'scores.question_id', '=', 'questions.id')
            ->select(DB::raw('scores.user_id as score_user_id,
              scores.question_id as score_question_id,
              scores.status_question as score_status_question,
              scores.note as score_note,
              scores.updated_at as score_updated_at,
              questions.title as question_title,
              questions.status as question_status,
              questions.updated_at as question_updated_at,
              questions.class_level as question_class_level'))
            ->where('scores.user_id', '=', $userId)
            ->where('questions.class_level', '=', $userLevel)
            ->where('questions.status', '=', 'published')
            ->get();
        $qcmWaiting = $scores->where('score_status_question', '=', 'undone')->count();
        $qcm = Question::find($id);
        $choices = DB::table('choices')
            ->select(DB::raw('choices.id as choice_id, choices.content as choice_content'))
            ->where('choices.question_id', '=', $qcm->id)
            ->get();

        return view('student.qcm.answer', compact('qcm', 'choices', 'scores', 'qcmWaiting'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qcm = Question::find($id);

        $score = 0;
        $potentialScore = 0;
        $user_id = $request->input('user_id');

        $choices = DB::table('choices')
            ->join('questions', 'choices.question_id', '=', 'questions.id')
            ->select(DB::raw('choices.status as choice_status,
                              choices.id as choice_id'))
            ->where('choices.question_id', '=', $qcm->id)
            ->get();

        foreach ($choices as $choice) {
            if ($choice->choice_status == "yes") {
                $potentialScore++;
                if (!empty($request->input('choice' . $choice->choice_id))) {
                    $score++;
                }
            } elseif ($choice->choice_status == "no") {
                $potentialScore++;
                if (empty($request->input('choice' . $choice->choice_id))) {
                    $score++;
                }
            }
        }
        $score = $score / $potentialScore;

        $scoresMatchTables = DB::table('scores')
            ->select(DB::raw('scores.note, scores.id'))
            ->where('scores.question_id', '=', $qcm->id)
            ->where('scores.user_id', '=', $user_id)
            ->get();

        $scoreObj = Score::find($scoresMatchTables[0]->id);

        $scoreObj->update(['note' => $score, 'status_question' => 'done']);

        return redirect('student/qcm/')->with(['title' => 'Reçu', 'message' => 'Réponses enregistrées', 'type' => 'success']);
    }


}
