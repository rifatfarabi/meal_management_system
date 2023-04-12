<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function index(Request $request)
    {
        // dd($request->all());

        $sort_search = null;
        $user_name = null;
        $start_date = $request->start_date;
        $end_date = $request->end_date;


        $users = User::all();
        $meals = Meal::orderby('id', 'desc');  //select  * from  meals orderBy id


        if($request->has('search')){
            $sort_search = $request->search;
            $meals = $meals->where(function($p) use($sort_search){

                $p->where('user_id','like', '%' .$sort_search . '%')
                ->orWhereHas('user', function($q) use ($sort_search){
                    $q->where("date", "like", "%$sort_search%");
                });
            });
        }

        if($request->$user_name != null){
            $meals = $meals->where('user_id', $request->user_name); // select  * from  meals  where user_id = $request->user_name orderBy id desc;
            $user_name = $request->user_name;
        }

        if($start_date != null){
            $meals = $meals->whereDate('date', '>=', date('Y-m-d', strtotime($start_date)));  //select  * from  meals whereDate date >= $request->start_date orderBy id desc;
        }
        if($end_date != null){
            $meals = $meals->whereDate('date', '>=', date('Y-m-d', strtotime($end_date))); //select  * from  meals whereDate date >= $request->start_date orderBy id desc;
        }

       $meals = $meals->paginate(5);

        return view('meal.index', compact('meals', 'users','user_name','start_date','end_date'));
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

        return redirect()->route('meal.index')->with("success", "Meal Created Successfully");
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
