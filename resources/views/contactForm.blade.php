@extends('layouts.landinglayouts')

@section('content')
    <div class="w-full h-screen">
        <div class="row mt-11">
            <div class="flex flex-col justify-center items-center md:w-2/4">

                <form action="{{ route('emailsend') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="w-full" name="name" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="w-full" name="email" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" class="w-full" name="subject" placeholder="Enter subject">
                    </div>

                    <div class="form-group">
                        <textarea name="message" cols="4" rows="4" class="w-full" placeholder="Message here..."></textarea>
                    </div>
                    <button type="submit" class="rounded-lg px-4 py-2 bg-green-700 text-green-100 hover:bg-green-800 duration-300">Send Email</button>
                </form>

            </div>
        </div>
    </div>
@endsection
