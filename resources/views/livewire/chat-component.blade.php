<div class="w-full  mx-auto mb-10  lg:w-1/2 float-right bg-white border rounded lg:ml-10 lg:mb-4">
    <div id="center-text" class=" bg-red-600 rounded-t p-4 text-white flex justify-between items-center">
        <h2>Chat</h2>
    </div>
    <div class="flex flex-col  h-full ">
        <div id="chat" class="h-96 overflow-y-scroll" wire:ignore>
            <ul id="chatList">
                @foreach ($messages as $msg)
                <li>
                    <div class="flex px-5 py-3">
                        <div class="w-8 h-8 p-3 rounded-full border flex justify-center items-center uppercase ">
                            {{$msg->sender->name[0]}}</div>
                        <div class="bg-gray-100 ml-3 rounded-b-lg rounded-tr-lg p-2">
                            <div class="flex items-center">
                                <span class="font-bold @if($msg->sender->user_status == 'user') text-green-500 @else text-red-600 @endif text-sm block">{{$msg->sender->name}}</span>
                                @php
                                    $diff_in_days = $msg->created_at->diffInDays(\Carbon\Carbon::now());
                                @endphp
                                <p class="text-xs ml-1 text-gray-500"> @if($diff_in_days == 0 || $diff_in_days == 1)  @if($diff_in_days == 0) Today @else Yesterday @endif {{substr($msg->created_at,10,-3)}}  @else {{substr($msg->created_at,0,-3)}} @endif</p>
                            </div>
                            <p class="text-black font-medium mt-1 whitespace-pre-line">{{$msg->message}}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
           

        </div>
        <div class="bg-gray-100 flex items-center relative">
            <form class= "w-full flex items-center">
                <textarea  id="chat-input" oninput="auto_height()" class="w-11/12 h-10 border-none  overflow-hidden bg-inherit  focus:ring-0"  placeholder="Send a message..." wire:ignore></textarea>
                <button type="button" onClick="send()"><i class="fa-regular fa-paper-plane ml-2"></i></button>
                <input type="hidden" id = "myid" value = {{Auth::id()}}>
            </form>
            <img wire:ignore id = "t" class="hidden rounded w-10 h-6 absolute left-2 -top-8" src="{{asset('/img/typing.gif')}}"/>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var hideHyping;
        Echo.private('<?php echo "workshop.".$workshop_id ?>')
            .listen('MessageEvent', (e) => {
                
                if(e.is_typing)  {
                    if(e.sender_id != document.getElementById("myid").value){
                        clearTimeout( hideHyping )
                        showTyping();
                    }
                }
                else{
                    var color = 'green-500 ';
                    if(e.sender_status != 'user') color = 'red-600 ';

                    var ul = document.getElementById("chatList");
                    var li = document.createElement("li");

                    li.innerHTML = '<div class="flex px-5 py-3"><div class = "w-8 h-8 p-3 rounded-full border flex justify-center items-center uppercase ">'+e.sender[0]+'</div>'+
                    '<div class="bg-gray-100 ml-3 rounded-b-lg rounded-tr-lg p-2"><div class = "flex items-center"><span class = "font-bold text-' +color+ 'text-sm block">'+e.sender+'</span> <p class="text-xs ml-1 text-gray-500">Today '+e.msg_time+'</p></div> <p class = "text-black font-medium mt-1 whitespace-pre-line">'+ e.msg +'</p></div></div>'
                    ; 
                    ul.appendChild(li);
                    
                    $("div").scrollTop($("#chatList")[0].scrollHeight);
                    document.getElementById("t").style.display = "none";
                }
            });
             window.onload = function() {
                $("div").scrollTop($("#chatList")[0].scrollHeight);               
            };

            function auto_height() {
                    var elem = document.getElementById("chat-input");
                    elem.style.height = "1px";
                    elem.style.height = (elem.scrollHeight)+"px";
            }
           
            var im_typing = false;
            var timeout_is_set = false;
            var timeout;

            function send() { 
                clearTimeout(timeout);
                im_typing = false;
                timeout_is_set = false;
                @this.send(document.getElementById('chat-input').value);
                document.getElementById("chat-input").value = "";
                auto_height();
            }

            $("textarea").keydown(function(e){
                // Enter was pressed without shift key
                if (e.keyCode == 13 && !e.shiftKey)
                {
                    e.preventDefault();
                    send();
                }
                if( e.keyCode >= 48 && e.keyCode <= 90){//add shift, space
                    if(!im_typing) {@this.typing(); im_typing = true;}
                    else  { // Send typing every 2 second, not every keydown
                        if(!timeout_is_set){
                            timeout_is_set = true;
                            timeout = window.setTimeout( 
                            function() {
                                @this.typing();
                                im_typing = false;
                                timeout_is_set = false;
                            }, 2000);
                        }
                    }
                }
            });

            function showTyping() { 
                document.getElementById("t").style.display = "block";
                hideHyping = window.setTimeout( 
                function() {
                    document.getElementById("t").style.display = "none";
                }, 2500);
            }
    </script>
</div>