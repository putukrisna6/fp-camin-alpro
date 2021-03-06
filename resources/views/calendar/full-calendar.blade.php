@extends('layouts.dash')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-2"><i class="fas fa-calendar-alt fa-sm mr-1"></i> Your Schedule</h1>
</div>

<div class="emp-profile shadow">
    <div id="calendar" class="p-5"></div>
</div>
@endsection

@section('date-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="{{ asset('js/calendar/calendar.js') }}" ></script>
@endsection
