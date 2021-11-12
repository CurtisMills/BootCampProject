@extends('layouts.main')


@section('content')

    <h2>Here are users that have liked you. 
    </h2>
    @if(count($users) == 0)
        <br>
        <br>
        <h4>Sorry no one has liked you yet :(</h4>
    @endif
    <div class="row">

        @foreach($users as $user)
            <div class="col-4" style="padding-top: 20px; padding-bottom: 20px">
                @include('components.like-card')
            </div>
        @endforeach
    </div>

@endsection