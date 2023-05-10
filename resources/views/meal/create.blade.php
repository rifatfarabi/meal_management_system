@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('meal.store')}}" method="POST">
                @csrf

                <select class="form-select" name="s_user" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>

                <div class="my-3">
                  <label for="meal_num" class="form-label">Number of Meal</label>
                  <input type="text" class="form-control" id="meal_num" name="meal_num">
                </div>
                <div class="my-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="my-3 d-flex">
                    <label for="meal_num" class="form-label me-3">User Name</label>
                    <input type="text" class="form-control" id="meal_num" name="meal_num">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
 </div>

@endsection
