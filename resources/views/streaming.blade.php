@extends('layouts.landinglayouts')
@section('content')
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pt-12 pb-16 justify-center w-4/5">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-6xl font-bold text-red-500">{{$streaming->title}} </h1>

        <section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
            <div class="container mx-auto px-5 py-12  ">
                <div class="lg:flex-grow lg:px-24 md:px-4 md:items-start md:text-left ">
                    {!! $streaming->description !!}
                </div>
            </div>
        </section>


<iframe class="w-6/12 aspect-video ..." src="{{$streaming->url}}"></iframe>

</div>
</div>

</section>



@endsection