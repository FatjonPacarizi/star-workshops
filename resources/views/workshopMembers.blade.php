@extends('layouts.landinglayouts')

@section('content')


<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pt-16 pb-16 justify-center w-4/5">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-6xl font-bold text-red-500">Meet the Team</h1>
            <h1 class="my-5 w-full md:w-3/4 ml-4 lg:w-1/2 text-xl">Our work is overseen by a board of directors that is chaired by William H. Tobey.
                Our staff consist of a small, dedicated team of international professionals who support WorkShops’ mission and vision and who work tirelessly to achieve WINS’ goals.
            </h1>
        </div>
        @foreach ($staffMembers as $staffMember)
        <div  class="w-full h-fit md:w-2/5 lg:w-1/4 p-6 bg-white md:ml-16 rounded-3xl mt-10">
            <img class="w-full object-cover rounded-tl-lg rounded-tr-lg p-5" src="{{$staffMember->user->profile_photo_path ? asset('/storage/' . $staffMember->user->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="" />
            <h5 class="py-1 text-3xl font-extrabold my-4 text-red-700">{{$staffMember->user->name}}</h5>
            <p  id = {{$staffMember->id}} class="py-1 font-semibold leading-6 text-base text-gray-600 "> {{\Illuminate\Support\Str::limit($staffMember->user->description, 150, $end='') }} <button onClick = "expandCard({{$staffMember->user->id}},'{{$staffMember->user->description}}')" class = "ml-2 text-blue-400">show more</button></p>
            <div class="flex h-10 mt-5 ">
                <a href="{{$staffMember->user->instagram}}" target="_blank"><i class="fa-brands fa-instagram fa-2xl" style="color:red"></i></a>
                <a href="{{$staffMember->user->facebook}}" target="_blank"><i class="fa-brands fa-facebook fa-2xl mx-4" style="color:red"></i></a>
                <a href="{{$staffMember->user->github}}" target="_blank"><i class="fa-brands fa-github fa-2xl" style="color:red"></i></a>
            </div>
        </div>
        @endforeach
        </div>

</section>

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
    function expandCard(id,fullText){
        document.getElementById(id).innerHTML = fullText + "   <button class = 'text-blue-400' onClick = 'collapseCard("+id+")'>less</button>";
    }
    function collapseCard(id){
        $( "#"+id ).load(window.location.href + " #"+id );
    }
</script>

@endsection