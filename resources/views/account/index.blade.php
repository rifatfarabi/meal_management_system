
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="text-left mt-2 mb-3" >
        <div class="row">
            <div class="d-flex justify-content-between">

                <h1 class="h3">{{ ('All Member Account')}}</h1>

                <div>
                    <a href="{{ route('home') }}" class="btn btn-success mx-3">
                        <span>{{ ('Back to Home') }}</span>
                    </a>
                    <a href="{{ route('account.create') }}" class="btn btn-circle btn-info">
                        <span>{{ ('Add New Account') }}</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <form action="" id="sort_search" method="GET">
            <div class="card-header row">
                <div class="col-md-2">
                    <select class="form-select" name="s_user" aria-label="Default select example">
                        <option selected>select user</option>

                        @foreach ($users as $user)
                         <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="{{ 'start date'}}" value="" date-format="DD-MM-Y">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="{{ 'end date'}}" value="" date-format="DD-MM-Y">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-warning">{{'Filter'}}</button>
                    </div>
                </div>

            </div>
         </form>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>{{ ('User ID') }}</th>
                        <th>{{ ('date') }}</th>
                        <th>{{ ('Paid') }}</th>
                        <th>{{ ('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $key => $account)
                        <tr>
                            <td>{{ ($key+1) + ($accounts->currentPage() - 1)*$accounts->perPage() }}</td>
                            <td>{{$account->user->name}}</td>
                            <td>{{$account->date}}</td>
                            <td>{{$account->paid}}</td>

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


