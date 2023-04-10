@extends('layouts.app')

@section('content')


<div class="container">
    <div class="mt-2 mb-3">
        <div class="row ">
            <div class="d-flex justify-content-between">
                <h1 class="h3">{{ ('All Member')}}</h1>

                <a href="{{ route('meal.create') }}" class="btn btn-circle btn-info">
                    <span>{{ ('Add New Member') }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Meals</h5>
        </div>
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
                            <td>{{$meal->user_id}}</td>
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

@endsection
