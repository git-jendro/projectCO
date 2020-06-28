<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $threads = Thread::orderBy('created_at','desc')
        ->get();
        $hitung = Thread::where('id_users', '=',$user->id);
        $comment = Comment::orderBy('created_at','desc')
        ->get();
        // $threads = Thread::all();
        // $thread = Thread::orderBy('created_at','desc')
        //         ->get();
       

        return view('/home',compact('threads','hitung','comment'));
    }
}
