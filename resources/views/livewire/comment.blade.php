<div class="container">

    <h1 class="text-3xl">Comments</h1>

    <form wire:submit.prevent="addComment">

        <input type="text" class="w-100 p-2 mr-2 my-2" placeholder="What's in your mind."wire:model.blur="newComment">
            @error('newComment') <span class="text-danger">{{ $message }}</span> @enderror
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        <div class="py-2">
            <button type="submit" class="m-5 btn btn-primary">Add</button>
        </div>
    </form>
    @foreach($comments as $comment)
    <div class=" p-3 my-2">
        <div class="flex justify-between my-2">
            <button class="btn btn-danger"wire:click="remove({{$comment->id}})">x</button>
            <div class="flex">
                <p class="font-bold text-lg">{{$comment->creator->name}}</p>
              <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at}}
                </p>
            </div>

        </div>
     <p class="text-gray-800">{{$comment->body}}</p>

    </div>
    @endforeach
    {{ $comments->links() }}

</div>


