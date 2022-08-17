
@extends('layouts.landinglayouts')

@section('content')


<section class="body-font bg-white-600 ">

    <div class="relative flex items-center justify-center">

        <p class="absolute text-7xl text-center text-white font-bold opacity-70">{{$about[0]->title}} <span class="text-red-700"></span></p>
        <img src="{{ asset('/storage/'.$about[0]->image) }}" alt="">
    </div>

    <div class="text-red-600 container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center ">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{$about[0]->heading}}</h1>
            <p>

            {{$about[0]->paragraph}}  <div class="flex justify-center">

                <a href="{{$about[0]->button}}"> <button style="margin-top: 20px;margin-left: -4px;"class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
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
                        </div>

                        <div class="pb-4">
                            {{--                        <label for="">Email</label>--}}
                            <input type="text" class="w-full rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700 py-3" name="email" placeholder="Enter your email">
                        </div>

                        <div class="pb-4">
                            {{--                        <label for="">Subject</label>--}}
                            <input type="text" class="w-full rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700 py-3" name="subject" placeholder="Enter subject">
                        </div>

                        <div class="pb-4">
                            <textarea name="message" cols="20" rows="4" class="w-full mt-3 rounded-md border-t-0 border-r-0 border-l-0 border-b-4 border-red-700" placeholder="Message here..."></textarea>
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
