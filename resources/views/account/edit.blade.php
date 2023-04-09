@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('account.update', $account->id)}}" method="POST">
                @csrf
                @method('PUT')
                <select class="form-select" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option selected value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>

                <div class="my-3">
                    <label for="paid" class="form-label">Paid</label>
                    <input type="text" class="form-control" id="paid" name="paid" value="{{ $account->paid}}">
                  </div>

                  <div class="my-3">
                    <label for="payable" class="form-label">Payable</label>
                    <input type="text" class="form-control" id="payable" name="payable" value="{{ $account->payable}}">
                  </div>

                  <div class="my-3">
                    <label for="meal_cost" class="form-label">Meal Cost</label>
                    <input type="text" class="form-control" id="meal_cost" name="meal_cost" value="{{ $account->meal_cost}}">
                  </div>


                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
 </div>

@endsection
