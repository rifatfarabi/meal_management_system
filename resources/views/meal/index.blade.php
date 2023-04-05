@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form>
                <select class="form-select" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>

                <div class="my-3">
                  <label for="exampleInputPassword1" class="form-label">Nmber of Meal</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="my-3">
                  <label for="exampleInputDate" class="form-label">Date</label>
                  <input type="date" class="form-control" id="exampleInputDate">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
 </div>

@endsection
