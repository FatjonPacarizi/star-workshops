@extends('layouts.app')
@section('content')


<div class="w-full h-full p-6 flex flex-col  items-center border">

<div class="w-full bg-white-200 rounded ">
@livewireCalendarScripts
<livewire:appointments-calendar/>
</div>
</div>
@endsection

