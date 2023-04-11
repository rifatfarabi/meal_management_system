
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="mt-2 mb-3">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h1 class="h3">{{ ('All Bazar List')}}</h1>
                <a href="{{ route('bazar.create') }}" class="btn btn-circle btn-info">
                    <span>{{ ('Add New Bazar') }}</span>
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
                        <th>{{ ('date') }}</th>
                        <th>{{ ('description') }}</th>
                        <th>{{ ('amount') }}</th>
                        <th>{{ ('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bazars as $key => $bazar)
                        <tr>
                            <td>{{ ($key+1) + ($bazars->currentPage() - 1)*$bazars->perPage() }}</td>
                            <td>{{$bazar->user->name}}</td>
                            <td>{{$bazar->date}}</td>
                            <td>{{$bazar->description}}</td>
                            <td>{{$bazar->amount}}</td>

                             <td class="text-right d-flex">
                                <a class="btn btn-primary mx-2" href="{{route('bazar.edit', $bazar->id)}}" title="{{ ('Edit') }}">
                                    Edit
                                </a>
                             <form action="{{route('bazar.destroy', $bazar->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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


