<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('meal.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $meal = Meal::create([
            "user_id" => $request->user_id,
            "meal_num" => $request->meal_num,
            "date" => $request->date
        ]);

        return redirect()->route('home')->with("success", "Meal Created SUccessfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Meal $meal)
    {
        $meal->update([
            "user_id" => $request->user_id,
            "meal_num" => $request->meal_num,
            "date" => $request->date
        ]);

        return redirect()->route('home')->with("success", "Meal Updated SUccessfully");
    }


    public function destroy($id)
    {
        //
    }
}
