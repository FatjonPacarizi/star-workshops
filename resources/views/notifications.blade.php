@extends('layouts.landinglayouts')
@section('content')

<section>
    <div class="md:container md:mx-auto px-5 xl:px-0 bg-gray-100">
        <h1 class="pb-5 pt-24 text-xl md:w-full text-red-500 text-center">
            <b>NOTIFICATION!</b>
        </h1>
    </div>
</section>

<section class="h-screen text-black body-font bg-gray-100 pb-5">
    <div class="border-2 border-gray-200 bg-white shadow-xl rounded-lg md:mx-96">
        <a href="#">
            @foreach(Auth::user()->notifications as $notification)
            <p class="m-3 text-x">Workshop <b> {{ $notification->data['name'] }} </b>has added.
                <br>
                <span class="text-gray-600 text-xs">{{\Carbon\Carbon::parse()->format('d F Y')}}</span>
            </p>
            <hr>
            @endforeach
        </a>
    </div>
</section>

@endsection