<?php

namespace App\Livewire;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Validaion\Rule as ValidationRule;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;


use Livewire\Component;
class Comment extends Component
{
        use WithPagination;

    #[Rule([
        'newComment' => 'required|max:255',
    ],
    )]

    public $newComment;
    //public $comments;



 public function addComment(){

    $this->validate(['newComment'=> 'required']);

            $createdComment=Post::create([
            'body'=>$this->newComment,
            'user_id'=>1,
            ]);
           // $this->comments->prepend( $createdComment);
            $this->newComment="";
            session()->flash('message', 'Comment Added successfully!');


    }


    public function mount ()
    {
     //   $initialComments = Post::latest()->get();
     //   $this->comments=$initialComments;

    }
    public function remove($id)
    {
          $comment=Post::find($id);
          $comment->delete();
        //  $this->comments= $this->comments->except($id);
          session()->flash('message', 'Comment deleted successfully!');


    }


    public function render()
    {
        return view('livewire.comment', [
            'comments' => Post::paginate(3),
        ]);
    }
}
