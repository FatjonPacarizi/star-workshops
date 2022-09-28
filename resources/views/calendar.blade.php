@extends('layouts.app')
@section('content')


<div class="w-full h-full px-10 flex flex-col  items-center">
<div class="w-full bg-white shadow-md rounded-xl" >
@livewireCalendarScripts
    <livewire:appointments-calendar
        before-calendar-view="calendar/before"
    />
</div>
</div>

@endsection

