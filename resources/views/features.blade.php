@extends('layouts.app')

@section('content')
<div class="jumbotron text-white m-0 bg-navbar rounded-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mt-2">
                <h1 class="display-4 font-italic">Teamwork like you have never seen before</h1>
                <p class="lead my-3">Collaborate, create, and connect with your team members from around the globe easily. With integrated plan scheduling and task manager, you and your team can rest easily knowing that your projects are in good hands.</p>
            </div>
            <div class="col-sm-4 mt-2">
                <img src="{{ asset('img/background/team3.jpg') }}" class="img-fluid" style="border: 2px solid #AAABB8" alt="">
            </div>
        </div>
        <hr class="my-4">
    </div>
</div>

<div class="jumbotron text-white m-0 bg-navbar rounded-0 ">
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-sm-8 mt-2">
                <h1 class="display-4 font-italic">Scheduling has never been this easy</h1>
                <p class="lead my-3"><em>Kesiboekan</em> Tracker integrated plan scheduling system allows for quick and accurate meetings, events, and deadlines planning. No need for endless discussion and late projects. Say goodbye to delays.</p>
            </div>
        </div>
        <hr class="my-4">
    </div>
</div>
<div class="jumbotron text-white m-0 bg-navbar rounded-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-2">
                <img src="{{ asset('img/background/team2.jpg') }}" class="img-fluid" style="border: 2px solid #AAABB8" alt="">
            </div>
            <div class="col-sm-8 mt-2">
                <h1 class="display-4 font-italic">Plan ahead, plan right</h1>
                <p class="lead my-3">Arrange the right time for your team, ahead of time. Let your team know when's the deadline is due and be informed on when the meeting should be.</p>
            </div>
        </div>
        <hr class="my-4">
    </div>
</div>
@endsection
