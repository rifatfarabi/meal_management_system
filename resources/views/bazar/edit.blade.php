@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('meal.update', $meal->id)}}" method="POST">
                @csrf
                @method('PUT')
                <select class="form-select" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option selected value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>

                <div class="my-3">
                  <label for="meal_num" class="form-label">Number of Meal</label>
                  <input type="text" class="form-control" id="meal_num" name="meal_num" value="{{ $meal->meal_num}}">
                </div>
                <div class="my-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{ $meal->date}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
 </div>

@endsection
