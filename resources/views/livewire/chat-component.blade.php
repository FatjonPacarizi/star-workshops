<div class="w-full mx-auto mb-10  lg:w-1/2 float-right bg-white border rounded lg:ml-10 lg:mb-4">
    <div id="center-text" class=" bg-red-600 rounded-t p-4 text-white flex justify-between items-center">
        <h2>Chat</h2>
    </div>
    <div id="body" class="">

        <div class="flex flex-col  h-full ">
            <div class="h-96  overflow-y-scroll " wire:ignore>

                <ul id="chatList">
                    @foreach ($messages as $msg)
                    <li> 
                        @php 
                           $name = $msg->sender;
                           $firstLetter = $name[0];
                        @endphp   
                        <div class="flex p-5">
                            <div class = "w-8 h-8 p-3 rounded-full border flex justify-center items-center ">{{$firstLetter}}</div> 
                            <div class="w-full bg-gray-100 ml-3 rounded p-2">
                                <span class = "text-black font-bold block">{{$msg->sender}}</span>
                                <p class = "text-xs text-gray-500">{{$msg->message}}</p> 
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div class="bg-gray-100">

                <input type="text" id="chat-input" class="w-11/12 bg-inherit border-none focus:ring-0"
                    placeholder="Send a message..."  wire:model="message" wire:keydown.enter="send('{{auth()->user()->name}}')"/>
                <button onClick = "clearInput()"  id="chat-submit"  wire:click = "send('{{auth()->user()->name}}')"> <i
                        class="fa-regular fa-paper-plane"></i></button>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('chat')
            .listen('MessageEvent', (e) => {
                const data = Object.values(e.msg);
                var ul = document.getElementById("chatList");
                var li = document.createElement("li");

                li.innerHTML = '<div class="flex p-5"><div class = "w-8 h-8 p-3 rounded-full border flex justify-center items-center ">'+data[0][0]+'</div>'+
                '<div class="w-full bg-gray-100 ml-3 rounded p-2"> <span class = "text-black font-bold block">'+data[0]+'</span> <p class = "text-xs text-gray-500">'+ data[1] +'</p></div></div>'
                ; 
                ul.appendChild(li);
                
                $('div').animate({scrollTop: $("#chatList li").last().offset().top},'slow');
            });
             function clearInput() {
                document.getElementById("chat-input").value = "";
             }
             window.onload = function() {
                $("div").scrollTop(1000);
               
            };

            //in case we need
              //     var ul = document.getElementById("chatList");
            //     var li = document.createElement("li");

            //     li.innerHTML = '<div class="flex p-5"><div class = "w-8 h-8 p-3 rounded-full border flex justify-center items-center ">'+ name[0] + '</div>'+
            //     '<div class="w-full bg-gray-100 ml-3 rounded p-2"> <span class = "text-black font-bold block">{{auth()->user()->name}}</span> <p class = "text-xs text-gray-500">'+ document.getElementById("chat-input").value +'</p></div></div>'
            //     ; 
            //     ul.appendChild(li);
            //     document.getElementById("chat-input").value = "";
            //     $('div').animate({scrollTop: $("#chatList li").last().offset().top},'slow');

    </script>
</div>
