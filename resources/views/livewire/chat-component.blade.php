<div class="w-full mx-auto mb-10  lg:w-1/2 float-right bg-white border rounded lg:ml-10 lg:mb-4">
    <div id="center-text" class=" bg-red-600 rounded-t p-4 text-white flex justify-between items-center">
        <h2>Chat</h2>
    </div>
        <div class="flex flex-col  h-full ">
            <div id = "chat" class="h-96 overflow-y-scroll " wire:ignore>
                <ul id="chatList">
                    @foreach ($messages as $msg)
                    <li>
                        <div class="flex px-5 py-3">
                            <div class="w-8 h-8 p-3 rounded-full border flex justify-center items-center uppercase ">
                                {{$msg->sender->name[0]}}</div>
                            <div class="bg-gray-100 ml-3 rounded-b-lg rounded-tr-lg p-2">
                                <span class="font-bold @if($msg->sender->user_status == 'user') text-green-500 @else text-red-600 @endif text-sm block">{{$msg->sender->name}}</span>
                                <p class="text-black font-medium mt-1 whitespace-pre-line">{{$msg->message}}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div class="bg-gray-100 flex items-center">
                <textarea type="text" id="chat-input" oninput="auto_height(this)" class="w-11/12 h-10 border-none  overflow-hidden bg-inherit  focus:ring-0" placeholder="Send a message..." wire:model.defer="message" ></textarea>
                <button onClick="clearInput()" id="chat-submit" wire:click="send()"> <i
                        class="fa-regular fa-paper-plane ml-2"></i></button>   
            </div>
        </div> 
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.private('<?php echo "workshop.".$workshop_id ?>')
            .listen('MessageEvent', (e) => {
                const data = Object.values(e.msg);
                
                var color = 'green-500 ';
                if(data[2] != 'user') color = 'red-600 ';

                var ul = document.getElementById("chatList");
                var li = document.createElement("li");

                li.innerHTML = '<div class="flex px-5 py-3"><div class = "w-8 h-8 p-3 rounded-full border flex justify-center items-center uppercase ">'+data[0][0]+'</div>'+
                '<div class="bg-gray-100 ml-3 rounded-b-lg rounded-tr-lg p-2"> <span class = "font-bold text-' +color+ 'text-sm block">'+data[0]+'</span> <p class = "text-black font-medium mt-1 whitespace-pre-line">'+ data[1] +'</p></div></div>'
                ; 
                ul.appendChild(li);
                
                $("div").scrollTop($("#chatList")[0].scrollHeight);
            });
             function clearInput() {
                document.getElementById("chat-input").value = "";
             }
             window.onload = function() {
                $("div").scrollTop($("#chatList")[0].scrollHeight);               
            };


            function auto_height(elem) { 
                elem.style.height = "1px";
                elem.style.height = (elem.scrollHeight)+"px";
            }

            $("textarea").keydown(function(e){
            // Enter was pressed without shift key
            if (e.keyCode == 13 && !e.shiftKey)
            {
                e.preventDefault();
                @this.send();
            }
            else{
              
            }
            });


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