
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="text-left mt-2 mb-3" >
        <div class="row">
            <div class="d-flex justify-content-between">
                
                <h1 class="h3">{{ ('All Member Account')}}</h1>

                <a href="{{ route('account.create') }}" class="btn btn-circle btn-info">
                    <span>{{ ('Add New Member Account') }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Account</h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>{{ ('User ID') }}</th>
                        <th>{{ ('Paid') }}</th>
                        <th>{{ ('Payable') }}</th>
                        <th>{{ ('Meal Cost') }}</th>
                        <th>{{ ('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $key => $account)
                        <tr>
                            <td>{{ ($key+1) + ($accounts->currentPage() - 1)*$accounts->perPage() }}</td>
                            <td>{{$account->user_id}}</td>
                            <td>{{$account->paid}}</td>
                            <td>{{$account->payable}}</td>
                            <td>{{$account->meal_cost}}</td>

                            <td class="text-right d-flex">
                                <a class="btn btn-primary mx-2" href="{{route('account.edit', $account->id)}}" title="{{ ('Edit') }}">
                                    Edit
                                </a>
                             <form action="{{route('account.destroy', $account->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                             </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $accounts->links()}}
        </div>
    </div>
</div>

@endsection


