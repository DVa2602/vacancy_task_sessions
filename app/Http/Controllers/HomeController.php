<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'sessions'=>Session::whereNotNull('user_id')->get()
        ]);
    }

    public function clearSession(Session $session)
    {
        $session->delete();
        return redirect()->back();
    }

    public function clearAllSession()
    {
        Session::where('user_id','<>',auth()->user()->id)->delete();
        return redirect()->back();
    }
}
