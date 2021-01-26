<?php

namespace App\Http\Controllers;

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
        
            if(Auth::user()->isAdmin == 1){
               return redirect(route('term')); 
            }
             if(Auth::user()->isAdmin == 3){
                return redirect(route('teacher.dashboard'));
            }
            if(Auth::user()->isAdmin == 4 && Auth::user()->vr == 1){
                return redirect(route('student.dashboard'));
            }elseif(Auth::user()->isAdmin == 4 && Auth::user()->vr == 2){
                return redirect(route('no_result'));
            }
            
            return redirect('/login');
       
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    
}
