@extends('layouts.landinglayouts')

@section('content')


<section class=" body-font bg-white ">


    <div class="relative mt-20 flex items-center justify-center ">

       
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.1576688368827!2d21.154011000000004!3d42.658014099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee5514d5483%3A0x5b8362656c47cff7!2sKosta%20Novakoviq%2C%20Prishtina!5e0!3m2!1sen!2s!4v1663744968362!5m2!1sen!2s" class="w-full " style="border:0;height: 500px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
     </div>

    <div class="w-full flex px-5 py-24 justify-center flex-wrap items-center">
        <div class="w-full  lg:w-2/5 lg:mr-20 md:p-2 flex flex-col  md:text-left items-center ">
            <div class="md:container md:mx-auto xl:px-0">
                <h1 class="pb-8 xl:pb-12  text-2xl xl:text-3xl md:w-full "> <span>
                        <p><strong><span>{{$about->heading}}</span></strong></p>
                    </span> </h1>
            </div>
            <p>{!! $about->paragraph !!}</p>
            <div class="flex justify-center">
                <a href="{{$about->button}}"> <button style="margin-top: 20px;margin-left: -4px;" class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
                </a>
            </div>
        </div>
        <div class=" w-full mt-10 lg:w-2/5 md:mt-0  md:p-2 flex flex-col md:items-start ">
            <div class=" w-full ">
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
                                <button type="submit" class=" rounded-tr-xl rounded-bl-xl px-12 py-2 bg-red-600 text-green-100 hover:bg-red-800 duration-300">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
            @foreach($faq->chunk(4) as $chunk)
                <div class="w-full lg:w-1/2 px-4 py-2 " > 
            @foreach($chunk as $f)
                    <details class="mb-4 text-gray-700">
                        <summary class="font-semibold cursor-pointer bg-gray-200 rounded-md py-2 px-4">
                            {{$f->question}}
                        </summary>
                        <p class="bg-gray-100 rounded-md py-2 px-4">
                            {{$f->answer}}
                        </p>
                    </details>@endforeach    
                </div> @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
