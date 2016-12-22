<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your admin screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        return view('admin.index');
    }

    // injection de la request
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'required'
            ]);
            // récupère un tableau associatif username password
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                // ici on passé avec succès authentification (middleware auth)
                // et donc on a accès à nos routes protégées
                return redirect('/admin')->with(['message' => 'success']);
            } else {
                return back()
                    ->withInput($request->only('username'))
                    ->with(['message' => 'Combinaison incorrecte']);
            }
        } else {
            return view('auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with(['message' => 'succes logout']);
    }
}
