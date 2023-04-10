@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('bazar.update', $bazar->id)}}" method="POST">
                @csrf
                @method('PUT')
                <select class="form-select" aria-label="Default select example">
                    <option selected>select user</option>

                    @foreach ($users as $user)
                     <option selected value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach

                </select>

                <div class="my-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{ $meal->date}}">
                </div>

                <div class="my-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $bazar->description}}">
                </div>

                <div class="my-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $bazar->amount}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
 </div>

@endsection
