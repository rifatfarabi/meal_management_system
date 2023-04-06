<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::paginate();
        return view('meal.index', compact('meals'));
    }


    public function create()
    {
        $users = User::all();
        return view('meal.create', compact('users'));
    }


    public function store(Request $request)
    {

        $meal = Meal::create([
            "user_id" => $request->user()->id,
            "meal_num" => $request->meal_num,
            "date" => $request->date
        ]);

        return redirect()->route('meal.index')->with("success", "Meal Created SUccessfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $users = User::all();
        $meal = Meal::find($id);
        return view('meal.edit', compact('meal','users'));
    }


    public function update(Request $request, Meal $meal)
    {
        $meal->update([
            "user_id" => $request->user()->id,
            "meal_num" => $request->meal_num,
            "date" => $request->date
        ]);

        return redirect()->route('meal.index')->with("success", "Meal Updated SUccessfully");
    }


    public function destroy($id)
    {
    
        $meal =Meal::find($id);
        $meal->delete();
        return redirect()->route('meal.index')->with("success", "Deleted SUccessfully");
    }
}
