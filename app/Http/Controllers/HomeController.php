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
        $accounts = Account::orderBy('id', 'desc');
        $bazars = Bazar::orderBy('id','desc');


       $meals = $meals->paginate(5);
       $bazars = $bazars->paginate(5);
       $accounts = $accounts->paginate(5);

        return view('home', compact('meals', 'users','user_name','accounts','bazars'));
    }
}
