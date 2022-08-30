<a href="/"> 
                        @php
                               $information = App\Models\Informations::all()->last();
                        @endphp             
                            <img class="block h-20 p-5 w-auto" alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
</a>