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
        $totalQcms = Question::all()->count();
        $scores = Score::all();
        $title = 'Dashboard';
        return view('student.dashboard', compact('title', 'scores'));
    }
    /**
     * Show the form for answering to a qcm.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer($id)
    {
        $qcm = Question::find($id);
        $choices = DB::table('choices')
            ->select(DB::raw('choices.id as choice_id, choices.content as choice_content'))
            ->where('choices.question_id', '=', $qcm->id)
            ->get();

        return view('student.qcm.answer', compact('qcm' , 'choices'));
    }

}
