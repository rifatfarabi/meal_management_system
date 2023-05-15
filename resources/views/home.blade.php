@extends('layouts.app')

@section('content')

<div class="container">

        <a href="{{ route('meal.index')}}" class="btn btn-primary mb-3">Meal</a>
        <a href="{{ route('account.index')}}" class="btn btn-primary mb-3">Account</a>
        <a href="{{ route('bazar.index')}}" class="btn btn-primary mb-3">Bazar</a>

        <div class="d-flex justify-content-between">



            @foreach ($bazars as $bazar)

                @php
                $amount = $bazar->whereMonth("created_at", \Carbon\Carbon::now()->month)->sum("amount");
                @endphp

            @endforeach
            <h5>Total Bazar: {{ $amount }}</h5>

            @foreach ($meals as $meal)
                @php
                    $total_meal = $meal->whereMonth("created_at", \Carbon\Carbon::now()->month)->sum("meal_num")
                @endphp
            @endforeach
            <h5>Total Meal: {{ $total_meal }}</h5>

            {{-- <h5>Meal Rate:{{ $amount / $total_meal }} </h5> --}}

            @php
                $meal_rate = ($amount / $total_meal);
            @endphp

            <h5>Meal Rate:{{ round($meal_rate, 2) }} </h5>

        </div>



    <div class="card">
        <form action="" id="sort_search" method="GET">
           <div class="card-header row">
               {{-- <div class="col-md-2">
                   <select class="form-select" aria-label="Default select example">

                       <option selected>select user</option>

                       @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                       @endforeach

                   </select>
               </div> --}}

           </div>
        </form>
           <div class="card-body">

            <table class="table">
                <thead>
                  <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Payable</th>
                        <th scope="col">T.Meal</th>
                        <th scope="col">M.Cost</th>
                        @for ($i=1; $i<= \Carbon\Carbon::now()->daysInMonth; $i++)
                        <th scope="col">{{$i}}</th>
                        @endfor

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{ $user->name }}</td>
                            @php
                                $paid = $user->accounts()->whereMonth("created_at", \Carbon\Carbon::now()->month)->sum("paid");
                                $amount = $user->bazars()->whereMonth("created_at", \Carbon\Carbon::now()->month)->sum("amount");
                                $t_paid = $paid + $amount;
                            @endphp
                            <td>{{ $t_paid }}</td>

                            @php
                                $payable = $t_paid  - round($meal_cost, 2);
                            @endphp

                            <td>{{ $payable }}</td>

                            @php
                              $total_meal = $user->meals()->whereMonth("created_at", \Carbon\Carbon::now()->month)->sum("meal_num");
                            @endphp
                            <td>{{ $total_meal }}</td>

                            @php
                                $meal_cost = ($total_meal * $meal_rate);
                            @endphp

                            <td>{{ round($meal_cost, 2) }}</td>

                            @for ($i=1; $i<= \Carbon\Carbon::now()->daysInMonth; $i++)
                                @php
                                    $month =\Carbon\Carbon::now()->month;
                                    $date = \Carbon\Carbon::createFromDate(null, $month, $i);

                                    $todaymeal = $user->meals()->whereMonth("date", $month)->whereDate('date', $date)->sum("meal_num");
                                @endphp
                                    <td scope="col">{{ $todaymeal }}</td>
                           @endfor

                        </tr>
                    @endforeach

                </tbody>
              </table>





               {{-- <table class="table aiz-table mb-0">
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
               {{ $meals->links()}} --}}
           </div>

       </div>
</div>

@endsection
