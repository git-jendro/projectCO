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
        
        //Threads
        $threads = Thread::orderBy('created_at','desc')
        ->get();
        $hitung = $threads->where('id_users', '=',$user->id);
        
        //Comments
        $comment = Comment::orderBy('id_threads','asc')
        ->get();
        // dd($c);
        
        return view('/home',compact('threads','hitung','comment','user'));
    }
    public function show($id)
    {
        //Show
        $thread = Thread::select('threads','id_users','id_threads')->where('id_users', '=', $id)->get();
        $show = $thread ->sortKeysDesc();
        $u = User::select('id','name','gender','email')->where('id','=',$id)
        ->get();
        $u->first()->id;
        $count = $show->where('id_users','=',$id);
        

       

        
        //Threads
        $threads = Thread::orderBy('created_at','desc')
        ->get();
        $user = Auth::user();
        $hitung = $threads->where('id_users', '=',$user->id);
        
        //Comments
        $comment = Comment::orderBy('id_threads','asc')
        ->get();

        return view('/show',compact('id','show','hitung','comment','u','count'));
    }
}
