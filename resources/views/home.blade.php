@extends('layouts.main')

@section('content')

    <h2>Here are your macthed users:
    </h2>
    @if(count($matchedUsers) == 0)
        <br>
        <br>
        <h4>You have either seen everyone, or no one matches your preferences.</h4>
    @endif
    <div class="row">
    @if(count($matchedUsers) > 0)
        <h3>Here are users macthed on your preferences!</h3>
        <br>
        <br>
    @endif

<div class="row">
    @foreach($matchedUsers as $preference)
    <div class="col-4" style="padding-top: 20px; padding-bottom: 20px">
        @include('components.user-profile')
    </div>
    @endforeach
</div>
@endsection