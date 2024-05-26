<?php

namespace App\Livewire\Blog\Post;

use Aaran\Blog\Models\Comment;
use Aaran\Blog\Models\Like;
use Aaran\Blog\Models\Post;
use Aaran\Master\Models\Contact;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;
    use CommonTrait;

    #region[properties]
    public $post_id;
    public string $vid = '';
    public $body;
    public Post $post;
    public $id;
    public $like = 0;
    public $user_id;
    #endregion

    #region[Increment]
    public function incrementLike()
    {
        $this->like++;

        if ($this->post_id != '') {
            if ($this->id != '') {
                Like::create([
                    'post_id' => $this->post_id,
                    'like' => $this->like,
                ]);
            }
        }
    }
    #endregion

    #region[Delete]
    public function set_delete($id): void
    {
        $comment = Comment::find($id);
        $comment->delete();
//        $this->redirect(route('posts'));
    }

        #region[mount]
        public function mount($id)
    {
        if ($id) {
            $this->post = Post::find($id);
            $this->post_id = $id;
            $this->likes = Like::find($this->post_id);
            $this->user_id = Auth::id();

        }
    }
    #endregion

    #region[Save]
    public function save()
    {
        $this->validate([
                'user_id' => 'required',
                'body' => 'required|min:3',
            ]
        );
        if ($this->post_id != '') {
            if ($this->vid == '') {
                Comment::create([
                    'body' => $this->body,
                    'user_id' => \Auth::id(),
                    'post_id' => $this->post_id,
                ]);
            } else {
                $comment = Comment::find($this->vid);
                $comment->body = $this->body;
                $comment->user_id = \Auth::id();
                $comment->post_id = $this->post_id;
                if ($comment->user_id == \Auth::id()) {
                    $comment->save();
                }

            }

            $this->clearFields();
        }
    }
    #endregion

    #region[Edit]
    public function editComment($id)
    {
        $obj = Comment::find($id);
        $this->vid = $obj->id;
        $this->body = $obj->body;
        $this->user_id = $obj->user_id;
        $this->post_id = $obj->post_id;
    }
    public function deleteComment($id)
    {
        $obj = Comment::find($id);
       $obj->delete();
    }
    #endregion

    #region[Clear]
    public function clearFields()
    {
        $this->body = '';

    }

    public function getContact()
    {
        $this->contacts = Contact::where('company_id', '=', session()->get('company_id'))->get();

    }
    #endregion


    #region[Render]
    public function render()
    {
        return view('livewire.blog.post.view')->layout('layouts.web')->with([
            'list' => Comment::where('post_id', '=', $this->post_id)->orderBy('created_at', 'desc')
                ->paginate(5),
            'likes' => Like::where('post_id', '=', $this->post_id)

        ]);
    }
    #endregion
}
