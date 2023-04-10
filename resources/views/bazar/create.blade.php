@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('bazar.store')}}" method="POST">
                @csrf

                <select class="form-select" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>
                <div class="my-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="my-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description">
                </div>

                <div class="my-3">
                  <label for="amount" class="form-label">Amount</label>
                  <input type="text" class="form-control" id="amount" name="amount">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
 </div>

@endsection
