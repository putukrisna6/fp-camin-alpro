@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-lg-6">
        <!-- Section Heading-->
        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
          <h3>{{ $group_name }} <span> Members</span></h3>
          <hr class="mb-4">
        </div>
      </div>
    </div>

    <div class="row">
        @if ($users->count() == 1)
            @foreach ($users as $user)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <!-- Team Thumb-->

                    <div class="advisor_thumb"><img src="{{ $user->profile->profileImage() }}" alt="" style="object-fit: cover; max-height: 12rem; min-height: 12rem">
                        <!-- Social Info-->
                        <div class="social-info">
                            <a href="/profile/show/{{ $user->id }}"><i class="fa fa-id-badge"></i></a>
                        </div>
                    </div>
                    <!-- Team Details-->
                    <div class="single_advisor_details_info">
                        <h6>{{ $user->name }}</h6>
                        <p class="designation">{{ $user->profile->profession }}</p>
                    </div>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($users->split($users->count()/2) as $row)
                @foreach ($row as $user)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->

                        <div class="advisor_thumb"><img src="{{ $user->profile->profileImage() }}" alt="" style="object-fit: cover; max-height: 12rem; min-height: 12rem">
                            <!-- Social Info-->
                            <div class="social-info">
                                <a href="/profile/show/{{ $user->id }}"><i class="fa fa-id-badge"></i></a>
                            </div>
                        </div>
                        <!-- Team Details-->
                        <div class="single_advisor_details_info">
                            <h6>{{ $user->name }}</h6>
                            <p class="designation">{{ $user->profile->profession }}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endif


    </div>
</div>
@endsection
