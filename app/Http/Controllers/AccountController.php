<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        $accounts = Account::paginate(5);
        return view('account.index', compact('accounts','users'));
    }


    public function create()
    {
        $users = User::all();
        return view('account.create',compact('users'));
    }


    public function store(Request $request)
    {
        $account = Account::create([
            "user_id" => $request->s_user,
            "paid" => $request->paid,
            "payable" => $request->payable,
            "meal_cost" => $request->meal_cost
        ]);

        return redirect()->route('account.index')->with("success", "Meal Created SUccessfully");
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::all();
        $account = Account::find($id);
        return view('account.edit', compact('account','users'));
    }


    public function update(Request $request, Account $account)
    {
        $account->update([
            "user_id" => $request->user()->id,
            "paid" => $request->paid,
            "payable" => $request->payable,
            "meal_cost" => $request->meal_cost
        ]);

        return redirect()->route('account.index')->with("success", "Meal Updated SUccessfully");
    }


    public function destroy($id)
    {
        //
    }
}
