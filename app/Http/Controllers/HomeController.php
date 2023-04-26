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
    public function index()
    {
        $users = User::all();
        $meals = Meal::all()->groupBy('user_id');


        // $meals = $meals->paginate(5);



        return view('home', compact('meals','users'));
    }
}
