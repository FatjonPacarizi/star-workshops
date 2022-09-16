<div>
    <div class="row justify-content-center">
        @if(auth()->user()->is_admin == true)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush">
                           
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $sender->name }}
                </div>
                <div class="card-body message-box" wire:poll.10ms="mountComponent()">
                    @if(filled($messages))
                        @foreach($messages as $message)
                            <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                <p class="my-0">{{ $message->message }}</p>
                           
                                <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
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
                            <div class="col-md-7">
                                <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" @if(!$file) required @endif>
                            </div>
                          
                            <div class="col-md-4">
                                <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
