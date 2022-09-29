@extends('layouts.app')
@section('content')
<div class="w-full h-full px-8 py-2 mb-16 flex flex-col items-center">
<div class="w-full bg-white shadow-md rounded-xl" >
@livewireCalendarScripts
    <livewire:appointments-calendar
        before-calendar-view="before"
    />
</div>
</div>
@endsection