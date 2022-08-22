
@extends('layouts.landinglayouts')

@section('content')


<section class="body-font bg-white-600 ">

    <div class="relative flex items-center justify-center">

        <p class="absolute text-7xl text-center text-white font-bold opacity-70">{{$about->title}} <span class="text-red-700"></span></p>

        <img  src="{{$about->image ? asset('/storage/' . $about->image) : asset('img/defultaboutimage.png') }}" alt="">
    </div>

    <div class="text-red-600 container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center ">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{$about->heading}}</h1>
            <p>

            {{$about->paragraph}}  <div class="flex justify-center">

                <a href="{{$about->button}}"> <button style="margin-top: 20px;margin-left: -4px;"class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
                </a></div>
        </div>

        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left">

            <div class=" w-full pl-5">
                <div class="justify-center items-center">
                    <div class="">
                        <p class="row flex justify-center items-center text-3xl font-semibold text-black">Contact Us</p>
                        <form action="{{ route('emailsend') }}" method="post">
                            @csrf
                            <div class="pb-4 pt-12">
                                {{--                        <label for="">Name</label>--}}
                                <input type="text" class="w-full rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700 py-3" name="name" placeholder="Enter your name">
                                @if ($errors->has('name'))
                                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                        </svg>
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="pb-4">
                                {{--                        <label for="">Email</label>--}}
                                <input type="text" class="w-full rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700 py-3" name="email" placeholder="Enter your email">

                                @if ($errors->has('email'))
                                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                        </svg>
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="pb-4">
                                {{--                        <label for="">Subject</label>--}}
                                <input type="text" class="w-full rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700 py-3" name="subject" placeholder="Enter subject">
                                @if ($errors->has('subject'))
                                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                        </svg>
                                        {{ $errors->first('subject') }}
                                    </div>
                                @endif
                            </div>

                            <div class="pb-4">
                                <textarea name="message" cols="20" rows="4" class="w-full mt-3 rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700" placeholder="Message here..."></textarea>
                                @if ($errors->has('message'))
                                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                        </svg>
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="w-full rounded-lg px-12 py-2 bg-red-600 text-green-100 hover:bg-red-800 duration-300">Send Email</button>
                        </form>



                    </div>
                </div>
            </div>



        </div>
    </div>
</section>



@endsection
