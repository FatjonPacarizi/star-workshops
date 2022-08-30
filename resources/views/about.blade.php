@extends('layouts.landinglayouts')

@section('content')


<section class="body-font bg-white ">

    <div class="relative flex items-center justify-center">

        <p class="absolute text-7xl text-center text-white font-bold opacity-70">{{$about->title}} <span class="text-red-700"></span></p>

        <img src="{{$about->image ? asset('/storage/' . $about->image) : asset('img/defultaboutimage.png') }}" alt="">
    </div>

    <div class="text-red-600 container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center ">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium  ">{{$about->heading}}</h1>
            <p>

                {{$about->paragraph}}
            <div class="flex justify-center">

                <a href="{{$about->button}}"> <button style="margin-top: 20px;margin-left: -4px;" class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
                </a>
            </div>
        </div>

        <div class="w-full pt-6 md:w-1/2 md:pt-0 md:pl-16 flex flex-col md:items-start ">

            <div class=" w-full pl-5 ">
                <div class="bg-[#F2F2F2] ">
                    <div class="">
                        <p class="text-3xl font-semibold text-red-700 p-6 px-6 pt-3">Send a message</p>
                        <form action="{{ route('emailsend') }}" method="post">
                            @csrf
                            <div class="px-6 ">
                                {{--<label for="">Name</label>--}}
                                <input type="text" class="w-full border-none rounded-md py-3" name="name" placeholder="Enter your name">

                                @if ($errors->has('name'))
                                <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                    </svg>
                                    {{ $errors->first('name') }}
                                </div>
                                @endif

                            </div>

                            <div class="px-6 pt-3">
                                {{-- <label for="">Email</label>--}}
                                <input type="text" class="w-full border-none rounded-md py-3" name="email" placeholder="Enter your email">

                                @if ($errors->has('email'))
                                <div class="bg-red-100 rounded-lg mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                    </svg>
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>

                            <div class="px-6 pt-3">
                                {{-- <label for="">Subject</label>--}}
                                <input type="text" class="w-full border-none rounded-md py-3" name="subject" placeholder="Enter subject">
                                @if ($errors->has('subject'))
                                <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                    </svg>
                                    {{ $errors->first('subject') }}
                                </div>
                                @endif
                            </div>

                            <div class="px-6 pt-3">
                                <textarea name="message" cols="20" rows="4" class="w-full border-none rounded-md py-3" placeholder="Message here..."></textarea>
                                @if ($errors->has('message'))
                                <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                    </svg>
                                    {{ $errors->first('message') }}
                                </div>
                                @endif
                            </div>

                            <div class=" px-6 pt-3 pb-6">
                                <button type="submit" class="w-1/3 rounded-tr-xl rounded-bl-xl px-12 py-2 bg-red-600 text-green-100 hover:bg-red-800 duration-300">Send Email</button>
                            </div>

                        </form>



                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
@php
$faq = App\Models\Faq::all()->take(10)->where('status', '==', 'Active');

@endphp
<div>
    <section class="text-gray-700">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">
                    Frequently Asked Question
                </h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto ">
                    The most common questions about how our business works and what
                    can do for you.
                </p>
            </div>
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                @foreach($faq as $f)
                <div class="w-full lg:w-1/2 px-4 py-2">
                    <details class="mb-4 text-gray-700">
                        <summary class="font-semibold cursor-pointer bg-gray-200 rounded-md py-2 px-4">
                            {{$f->question}}
                        </summary>
                        <p class="bg-gray-100 rounded-md py-2 px-4">
                            {{$f->answer}}
                        </p>

                    </details>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

<button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full bg-red-600 ring-2 ring-white text-white -rotate-90 text-5xl font-bold">&#10132;</button>


<!-- Javascript code -->
<script>
    var toTopButton = document.getElementById("to-top-button");

    // When the user scrolls down 200px from the top of the document, show the button
    window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            toTopButton.classList.remove("hidden");
        } else {
            toTopButton.classList.add("hidden");
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function goToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>


@endsection