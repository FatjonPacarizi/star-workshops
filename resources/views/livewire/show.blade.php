<div>
    <div class=" w-full mt-10 lg:w-2/5 md:mt-0  md:p-2 flex flex-col md:items-start">
        @if(auth()->user()->is_admin == true)
            <div class="w-full">
                <div class="">
                    <div class="">
                        Users 
                    </div>
                   
                </div>
            </div>
        @endif
        <div class="text-3xl font-semibold text-red-700 p-6 px-6 pt-3">
            <div class="card">
                <div class="card-header">
                    {{ $sender->name }}
                </div>
                <div class="text-3xl font-semibold text-red-700 p-6 px-6 pt-3" wire:poll.10ms="mountComponent()">
                    @if(filled($messages))
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
                </div>
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
            </div>
        </div>
    </div>
</div>
