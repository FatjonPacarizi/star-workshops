<div>

    <div class=" w-full mt-10 lg:w-2/5 md:mt-0  md:p-2 flex flex-col md:items-start " wire:poll="mountComponent()">
     
    <div class=" w-full ">
            <div class="bg-[#F2F2F2] "">
                <div class="">
                    @if(isset($clicked_user)) {{ $clicked_user->name }}

                    @elseif(auth()->user()->is_admin == true)
                        Select a user to see the chat
                    @elseif($admin->is_online)
                        <i class="fa fa-circle text-success"></i> We are online
                    @else
                        Messages
                    @endif
                </div>
                    <div class="text-3xl font-semibold text-red-700 p-6 px-6 pt-3"">
                        @if(!$messages)
                            No messages to show
                        @else
                            @if(isset($messages))
                                @foreach($messages as $message)
                                    <div class=" @if($message->user_id !== auth()->id()) received @else sent @endif">
                                        <p class=" w-full border-none rounded-md py-3">{{ $message->user->name }}</p>
                                        <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full">
                                        <p class="w-full border-none rounded-md py-3">{{ $message->message }}</p>
                                     
                                        <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small></div>
                                    </div>
                                @endforeach
                            @else
                                No messages to show
                            @endif
                            @if(!isset($clicked_user) and auth()->user()->is_admin == true)
                                Click on a user to see the messages
                            @endif
                        @endif
                    </div>
                @if(auth()->user()->is_admin == false)
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                            <div wire:loading wire:target='SendMessage'>
                                Sending message . . . 
                            </div>
                          
                            <div class="row">
                                <div class="px-6 pt-3">
                                    <input wire:model="message" class="w-full border-none rounded-md py-3" placeholder="Type a message" @if(!$file) required @endif>
                                </div>

                                <div class="col-md-4">
                                    <button class="rounded-tr-xl rounded-bl-xl px-12 py-2 bg-red-600 text-green-100 hover:bg-red-800 duration-300"><i class="far fa-paper-plane"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>