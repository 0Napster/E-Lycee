<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPosts = Post::all()->count();
        $totalQcms = Question::all()->count();
        $title = 'Dashboard';
        return view('admin.dashboard', compact('totalPosts', 'total', 'title'));
    }
}
