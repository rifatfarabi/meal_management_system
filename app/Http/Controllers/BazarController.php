<?php

namespace App\Http\Controllers;

use App\Models\Bazar;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class BazarController extends Controller
{

    public function index()
    {
        $bazars = Bazar::paginate(5);
        return view('bazar.index',compact('bazars'));
    }


    public function create()
    {
        $users = User::all();
        return view('bazar.create', compact('users'));
    }


    public function store(Request $request)
    {
        $bazar = Bazar::create([
            "user_id" => $request->user()->id,
            "date" => $request->date,
            "description" => $request->description,
            "amount" => $request->amount,

        ]);

        return redirect()->route('bazar.index')->with("success", "Bazar Created Successfully");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $users = User::all();
        $bazar = Bazar::find($id);
        return view('bazar.edit', compact('bazar','users'));
    }


    public function update(Request $request, Bazar $bazar)
    {
        $bazar->update([
            "user_id" => $request->user()->id,
            "date" => $request->date,
            "description" => $request->description,
            "amount" => $request->amount,

        ]);

        return redirect()->route('bazar.index')->with("success", "Bazar Updated Successfully");
    }


    public function destroy($id)
    {
        $bazar = Bazar::find($id);
        $bazar->delete();
        return redirect()->route('bazar.index')->with("success", "Deleted SUccessfully");
    }
}
