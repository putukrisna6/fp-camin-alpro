@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-lg-6">
        <!-- Section Heading-->
        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <h3><i class="fas fa-id-badge fa-sm mr-1"></i> {{ $user->name }}'s Profile Page</h3>
          <hr class="mb-4">
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-lg-6">
            <div class="bg-navbar rounded-lg shadow p-3">
                <div class="profile-img mb-0">
                    <img src="{{ $user->profile->profileImage() }}" alt="">
                </div>
                <div class="row justify-content-center mt-2 mb-0 text-white">
                    <h5>{{ $user->profile->profession }}</h5>
                </div>
                <hr class="my-3" style="border-top: 1px solid white;">
                <div class="text-left bg-white text-dark p-3 rounded-lg mb-3">
                    <p class="text-muted mb-0">Location</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $user->profile->location }}</p class="">
                    <p class="text-muted mb-0">Education</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $user->profile->education }}</p class="">
                    <p class="text-muted mb-0">Email</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ $user->email }}</p class="">
                    <p class="text-muted mb-0">Since</p>
                    <hr class="m-0 mb-2">
                    <p class="card-text">{{ date('d M Y', strtotime($user->created_at)) }}</p class="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
