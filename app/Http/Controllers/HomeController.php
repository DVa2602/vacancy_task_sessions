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

    public function clearSession(Request $request ,Session $session)
    {
        $session->delete();
        $request->session()->flash('status', 'Session user:'.$session->user->name.' closed!');
        return redirect()->back();
    }

    public function clearAllSession(Request $request)
    {
        Session::where('user_id','<>',auth()->user()->id)->delete();
        $request->session()->flash('status', 'All Session closed!');
        return redirect()->back();
    }
}
