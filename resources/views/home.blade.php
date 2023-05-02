@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/meal" class="btn btn-primary mb-3" role="button">Meal</a>
    <a href="/meal" class="btn btn-primary mb-3" role="button">Acoount</a>
    <a href="/meal" class="btn btn-primary mb-3" role="button">Bazar</a>
    {{-- <button type="submit" class="btn btn-primary mb-3">Meal</button>
    <button type="submit" class="btn btn-primary mb-3">Account</button>
    <button type="submit" class="btn btn-primary mb-3">Bazar</button> --}}
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
            <th scope="col">6</th>
            <th scope="col">7</th>
            <th scope="col">8</th>
            <th scope="col">9</th>
            <th scope="col">10</th>
            <th scope="col">11</th>
            <th scope="col">12</th>
            <th scope="col">13</th>
            <th scope="col">14</th>
            <th scope="col">15</th>
            <th scope="col">16</th>
            <th scope="col">17</th>
            <th scope="col">18</th>
            <th scope="col">19</th>
            <th scope="col">20</th>
            <th scope="col">21</th>
            <th scope="col">22</th>
            <th scope="col">23</th>
            <th scope="col">24</th>
            <th scope="col">25</th>
            <th scope="col">26</th>
            <th scope="col">27</th>
            <th scope="col">28</th>
            <th scope="col">29</th>
            <th scope="col">30</th>
            <th scope="col">31</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1.5</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
          </tr>
        </tbody>
      </table>
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
