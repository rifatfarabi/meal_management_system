<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        // $users = User::all();
        // $accounts = Account::paginate(5);

        $sort_search = null;
        $user_name = null;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $users = User::all();
        $accounts = Account::orderBy('id','desc');

        if($request->user_name != null){
            $accounts = $accounts->where('user_id', $request->user_name);
            $user_name = $request->user_name;
        }

        if($start_date != null){
            $accounts = $accounts->wheredate('date', '>=', date('Y-m-d', strtotime($start_date)));
        }

        if($end_date != null){
            $accounts = $accounts->wheredate('date', '<=', date('Y-m-d', strtotime($end_date)));
        }

        $accounts = $accounts->paginate(5);

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
            "date" => $request->date
            // "payable" => $request->payable,
            // "meal_cost" => $request->meal_cost
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
            "date" => $request->date
            // "payable" => $request->payable,
            // "meal_cost" => $request->meal_cost
        ]);

        return redirect()->route('account.index')->with("success", "Meal Updated SUccessfully");
    }


    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->route('account.index')->with("success", "Deleted SUccessfully");
    }
}
