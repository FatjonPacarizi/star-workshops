@extends('layouts.landinglayouts')
@section('content')

<section class="text-white body-font bg-red-700 mt-10">
    <div class="mx-auto flex px-5 py-24 md:flex-row flex-col md:px-16  lg:px-24 items-center">
        <div class="w-10/12 lg:flex-grow md:w-1/2  flex flex-col md:items-start md:text-left ">
            <a href="{{route('workshops')}}" class="inline-flex border-0 text-black  text-sm hover:text-white">
                < BACK TO EVENTS</a>
                    <h1 class="title-font text-3xl md:text-4xl my-4 font-medium text-white lg:text-5xl ">
                        {{$workshop->name}}
                    </h1>
                    <p class="mb-8 leading-relaxed"> {{$workshop->time}} </p>
                    <p class="mb-8 leading-relaxed"> {{$workshop->country->name}}</p>

                    <p class="mb-8 leading-relaxed">Author : {{$workshop->user->name}}</p>

                    @if($upcoming)
                            @if($limitReached)
                                <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">Limitaion for this event
                                    have been reached: {{$participants}} participants</p>
                            @elseif($already_applied)
                                @if($application_status[0]->application_status == 'pending')
                                    <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">
                                        @if(session()->has('message'))
                                            {{session('message')}}
                                        @else
                                            Your application is still pending
                                        @endif
                                    </p>
                                @elseif($application_status[0]->application_status == 'notapproved')
                                    <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">
                                        Your application is not approved
                                        <a class="text-sky-800 underline" href='/about'>Contact Us</a>
                                    </p>
                                @else {{--approved --}}
                                    @if($workshop->workshop_startTime == null && $workshop->workshop_endTime == null) {{--Nese nuk ka fillu dhe nuk ka perfundu(mundet me bo end pa e bo start)--}}
                                        <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">
                                            This event will start: {{ $workshop->time}}
                                        </p>
                                    @else
                                        @if($workshop->workshop_startTime != null) {{--nese ka startu--}}
                                            @php
                                                $workshopFirstStreaming = \App\Models\Streaming::where('workshop_id',$workshop->id)->first();
                                            @endphp    
                                            @if($workshopFirstStreaming != null) 
                                                <a href="/workshop/{{$workshop->id}}/streaming/{{$workshopFirstStreaming->id}}" class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black flex items-center">
                                                    Show courses
                                                </a>
                                            @else   
                                            <a href="#" class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black flex items-center">
                                                No courses found
                                            </a>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @else {{--  limit not reached, not applyed yet --}}
                                @can('is_admin_or_superadmin')
                                    @if($workshop->workshop_startTime == null && $workshop->workshop_endTime == null)
                                        <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">This event will start: {{
                                            $workshop->time}}</p>
                                    @else
                                        @if($workshop->workshop_startTime != null)
                                            @php
                                                $workshopFirstStreaming = \App\Models\Streaming::where('workshop_id',$workshop->id)->first();
                                            @endphp    
                                            @if($workshopFirstStreaming != null) 
                                                <a href="/workshop/{{$workshop->id}}/streaming/{{$workshopFirstStreaming->id}}" class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black flex items-center">
                                                    Show courses
                                                </a>
                                            @else   
                                            <a href="#" class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black flex items-center">
                                                No courses found
                                            </a>
                                            @endif
                                        @endif
                                    @endif

                                @else {{--user i thjeshte--}}
                                    <a class="mb-8 px-5 py-2 bg-white rounded-md text-black"
                                        href="/workshops/{{$workshop->id}}/join">Apply</a>
                                @endcan
                            @endif
                    @else
                      <p class="mb-8 leading-relaxed px-5 py-2 bg-white rounded-md text-black">Applications for this event
                        are closed</p>
                    @endif
        </div>

        <div class="lg:max-w-lg lg:w-full  md:w-1/2 w-5/6">

            <img class="object-cover rounded" alt="hero"
                src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}">
        </div>
    </div>
</section>


<section class=" body-font bg-white my-14 px-5  md:px-16  lg:px-24">
    <div class = "min-h-[32rem]">
        @auth
            @can('is_super_admin')
                    @livewire('chat-component', ['workshop' => $workshop])
            @else
                @if(auth()->user()->user_status == 'admin' && $workshop->author == auth()->user()->id) 
                    @livewire('chat-component', ['workshop' => $workshop])
                @else
                    @if($already_applied && $application_status[0]->application_status == 'approved')
                        @livewire('chat-component', ['workshop' => $workshop])
                    @endif
                @endif
            @endcan
        @endauth
        <p>{!! $workshop->description !!}</p>
    </div>
</section>

@unless(count($streamings) == 0)
<div class="overflow-x-auto">
        <div class="min-w-screen min-h-fit bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">

            
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Intruduction</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($streamings as $str)
                        @if($str->status == 'free')
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium"><a href="/workshop/{{$workshop->id}}/streaming/{{$str->id}}" ><i class="fa-solid fa-circle-play text-red-600"></i>  {{$str->title }}</a></span>
                                    </div>
                                </td>
                       
                                <td class="py-3 px-3 text-center"><i class="fa fa-youtube-play"></i>
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"><a href="/workshop/{{$workshop->id}}/streaming/{{$str->id}}"  >Preview</a></span>
                                </td>
                            </tr> @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                            
                    <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Advance Course</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($streamings as $str)
                            @if($str->status == 'paid')
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium"><a href="/workshop/{{$workshop->id}}/streaming/{{$str->id}}" > <i class="fa-solid fa-circle-play text-red-600"></i>  {{$str->title }}</a></span>
                                    </div>
                                </td>
                       
                                <td class="py-3 px-6 text-center"><i class="fa fa-youtube-play"></i>
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"><a href="/workshop/{{$workshop->id}}/streaming/{{$str->id}}"> Preview</a></span>
                                </td>
                            </tr> @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
</div>@endunless
@endsection