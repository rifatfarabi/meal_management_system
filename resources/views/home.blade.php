@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('meal.index')}}" class="btn btn-primary mb-3">Meal</a>
    <a href="{{ route('account.index')}}" class="btn btn-primary mb-3">Account</a>
    <a href="{{ route('bazar.index')}}" class="btn btn-primary mb-3">Bazar</a>

    <div class="card">
        {{-- <form action="" id="sort_search" method="GET">
           <div class="card-header row">
               <div class="col-md-2">
                   <select class="form-select" aria-label="Default select example">
                       <option selected>select user</option>

                       @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                       @endforeach

                   </select>
               </div>

               <div class="col-md-2">
                   <div class="form-group mb-0">
                       <input type="date" class="form-control" id="start_date" name="start_date" placeholder="{{ 'start date'}}" value="{{ $start_date}}" date-format="DD-MM-Y">
                   </div>
               </div>

               <div class="col-md-2">
                   <div class="form-group mb-0">
                       <input type="date" class="form-control" id="end_date" name="end_date" placeholder="{{ 'end date'}}" value="{{ $end_date}}" date-format="DD-MM-Y">
                   </div>
               </div>

               <div class="col-md-2">
                   <div class="form-group mb-0">
                       <button type="submit" class="btn btn-warning">{{'Filter'}}</button>
                   </div>
               </div>

           </div>
        </form> --}}
           <div class="card-body">
               <table class="table aiz-table mb-0">
                   <thead>
                       <tr>
                           <th width="10%">#</th>
                           <th>{{ ('User ID') }}</th>
                           <th>{{ ('Number of Meal') }}</th>
                           <th>{{ ('date') }}</th>
                           <th>{{ ('Options') }}</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($meals as $key => $meal)
                           <tr>
                               <td>{{ ($key+1) + ($meals->currentPage() - 1)*$meals->perPage() }}</td>
                               <td>{{$meal->user->name}}</td>
                               <td>{{$meal->meal_num}}</td>
                               <td>{{$meal->date}}</td>

                                <td class="text-right d-flex">
                                   <a class="btn btn-primary mx-2" href="{{route('meal.edit', $meal->id)}}" title="{{ ('Edit') }}">
                                       Edit</i>
                                   </a>
                                <form action="{{route('meal.destroy', $meal->id)}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                               </td>

                           </tr>
                       @endforeach
                   </tbody>
               </table>
               {{ $meals->links()}}
           </div>
       </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
