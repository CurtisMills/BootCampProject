@extends('layouts.main')


@section('content')

    <h2>Here are your macthes:
    </h2>
    @if(count($users) == 0)
        <br>
        <br>
        <h4>Sorry you have no matches :( please keep swiping or change your preferences to expand your search</h4>
    @endif
    <div class="row">
    @if(count($users) > 0)
        <h3>Congratulations, here are your housemate matches!!</h3>
        <br>
        <br>
    @endif
        @foreach($users as $user)
            <div class="col-4" style="padding-top: 20px; padding-bottom: 20px">
                @include('components.match-card')
            </div>
        @endforeach
    </div>

@endsection