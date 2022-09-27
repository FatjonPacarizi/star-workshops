
<div class="space-y-4 h-fit">
@foreach($comments as $comment)
    <div class="flex h-fit">
      <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{$comment->user->profile_photo_path ? asset('/storage/' . $comment->user->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="">
      </div>
        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong>{{$comment->name}}</strong>
        @if($comment->user_id == Auth::user()->id)
        <form method="POST" action="/comment/delete/{{$comment->id}}" class="inline flex justify-end">
              @csrf
              @method('DELETE')
              <button>
              <span class="text-xs text-gray-400 flex justify-end"><i class="fa-solid fa-trash-can text-red-400"></i></span>
              </button>
        </form>  
        @endif
        <p class="text-sm">{{$comment->comment}}</p>
      </div>  
    </div>
    @endforeach
    <div class = "h-12">{{$comments->links()}}</div>
    </div>
