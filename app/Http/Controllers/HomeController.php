<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bazar;
use App\Models\Meal;
use App\Models\User;
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
    public function index(Request $request)
    {
        $user_name = null;

        $users = User::all();
        $meals = Meal::orderBy('id', 'desc');//select  * from  meals orderBy id
        $accounts = Account::paginate(5);
        $bazars = Bazar::orderBy('id','desc');




        // if($request->$user_name != null){
        //     $meals = $meals->where('user_id', $request->user_name); // select  * from  meals  where user_id = $request->user_name orderBy id desc;
        //     $user_name = $request->user_name;
        // }

       $meals = $meals->paginate(5);
       $bazars = $bazars->paginate(5);

        return view('home', compact('meals', 'users','user_name','accounts','bazars'));

        // $users = User::all();
        // $meals = Meal::all()->groupBy('user_id');
        // return view('home', compact('meals','users'));
    }
}
