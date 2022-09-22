@extends('layouts.landinglayouts')

@section('content')
<section class="text-white body-font bg-red-700 ">
    <div class="mx-auto flex px-5 py-24 md:flex-row flex-col  items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left ">
            <a href="{{route('workshops')}}" class="inline-flex border-0 text-black  text-sm hover:text-white">
                    < BACK TO EVENTS</a>
            <h1 class="title-font sm:text-4xl my-4 font-medium text-white text-5xl ">
                {{$workshop->name}}
            </h1>
            <p class="mb-8 leading-relaxed"> {{$workshop->time}} </p>
            <p class="mb-8 leading-relaxed"> {{$workshop->country->name}}</p>

            <p class="mb-8 leading-relaxed">Author : {{$workshop->user->name}}</p>

            @if($upcoming)
            @if($limitReached)
            <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">Limitaion for this event have been reached: {{$participants}} participants</p>
            @elseif($already_applied)
            <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">
                @if($application_status[0]->application_status == 'pending')
                    @if(session()->has('message')) {{session('message')}}
                    @else 
                        Your application is still pending
                    @endif
                 @elseif($application_status[0]->application_status == 'notapproved')

                    Your application is not approved
                    <a class="text-sky-800 underline" href='/about'>Contact Us</a>

                 @else
                    This event will start: {{ $workshop->time}}
                @endif
            </p>
            @else
                @can('is_admin_or_superadmin')
                <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">This event will start: {{ $workshop->time}}</p>
                    @else
                    <a class="mb-8 px-5 py-2 bg-white rounded-md text-black" href= "/workshops/{{$workshop->id}}/join">Apply</a>
                @endcan
            @endif
            @else
            <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">Applications for this event are closed</p>
            @endif
        </div>

        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">

            <img class="object-cover rounded" alt="hero" src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}">
        </div>
    </div>
</section>


<section class=" body-font bg-white">
    <div class="container mx-auto px-5 py-24  ">
        <div class="lg:flex-grow lg:px-24 md:px-4 md:items-start md:text-left ">
            {!! $workshop->description !!}
        </div>
    </div>
</section>


<div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Title</th>
                               
                                <th class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($streamings as $str)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium"><a href={{route('streaming',$str->id)}}>{{$str->name }}</a></span>
                                    </div>
                                </td>
                       
                                <td class="py-3 px-6 text-center"><i class="fa fa-youtube-play"></i>
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"><a href={{route('streaming',$str->id)}}>Preview</a></span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full bg-red-600 ring-2 ring-white text-white -rotate-90 text-5xl font-bold">&#10132;</button>

<script>
    var toTopButton = document.getElementById("to-top-button");
    window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            toTopButton.classList.remove("hidden");
        } else {
            toTopButton.classList.add("hidden");
        }
    }
    function goToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

@endsection