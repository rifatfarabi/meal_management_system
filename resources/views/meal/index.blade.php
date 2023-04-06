@extends('layouts.app')

@section('content')


<div class="container">
    <div class="text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ ('All Member')}}</h1>
            </div>
            <div class="col-md-6 ">
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

                             <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('meal.edit', $meal->id)}}" title="{{ ('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                             <form action="{{route('meal.destroy', $meal->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                                {{-- <a href="{{route('meal.destroy', $meal->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="{{ ('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a> --}}
                             </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
