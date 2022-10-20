@extends('layouts.app')
@section('content')
<div class="lg:w-full w-[1200px] h-full px-8 py-2 mb-16">
<div class="w-full bg-white shadow-md rounded-xl" >
@livewireCalendarScripts
    <livewire:appointments-calendar
        before-calendar-view="before"
    />
</div>
</div>
@endsection