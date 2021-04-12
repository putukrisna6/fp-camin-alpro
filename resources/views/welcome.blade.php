@extends('layouts.app')

@section('content')
<div class="position-relative overflow-hidden text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal"><em>Kesiboekan</em> Tracker</h1>
        <div class="text-nowrap d-flex justify-content-center align-items-center animated-text noSelect" style="background: rgba(255,255,255,0);border-style: none;margin-top: 16px;width: 50%;margin-right: auto;margin-left: auto;">
            <div class="caption v-middle text-center">
                <h1 class="cd-headline clip">
                    <span class="blc">Redefining</span>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">Teams.</b>
                        <b>Cooperation.</b>
                        <b>Meetings.</b>
                    </span>
                    <span class="blinking">|</span>
                </h1>
            </div>
        </div>
        <a class="btn btn-outline-secondary m-3" href="#">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="jumbotron text-white m-0 bg-navbar">
    <div class="container">
        <div class="col-md-6 px-0">

        </div>
        <div class="row">
            <div class="col-sm-8 mt-2">
                <h1 class="display-4 font-italic">Streamline your organization</h1>
                <p class="lead my-3"><em>Kesiboekan</em> Tracker features rich tools to help you and your team collaborate and connect easily.</p>
                <a class="btn btn-outline-secondary btn-light" href="#">Sign up now</a>
            </div>
            <div class="col-sm-4 mt-2">
                <img src="{{ asset('img/background/team.jpg') }}" class="img-fluid" style="border: 2px solid #AAABB8" alt="">
            </div>
        </div>
    </div>
</div>
<div class="jumbotron text-center m-0 bg-light">
    <div class="container">
        <h1 class="jumbotron-heading">Request a demo</h1>
        <p class="lead text-muted">Contact us to start integrating your workflow with <em>Kesiboekan</em> Tracker.</p>
        <p>
            <a class="btn btn-outline-secondary m-1" href="#">Contact us</a>
        </p>
    </div>
</div>
@endsection
