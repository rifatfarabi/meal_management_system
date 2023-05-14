@extends('layouts.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('account.store')}}" method="POST">
                @csrf

                <select class="form-select" name="s_user" aria-label="Default select example">
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
                  <label for="paid" class="form-label">Paid</label>
                  <input type="text" class="form-control" id="paid" name="paid">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
 </div>

@endsection
