<?php

namespace App\Livewire\Blog\Post;

use Aaran\Blog\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upsert extends Component
{
    use WithFileUploads;

    #region[properties]
    public mixed $vid = '';
    public string $title;
    public string $body;
    public $image;
    public $isUploaded=false;
    public $id;
    public $user_id;
    public $company_id;
    #endregion

    #region[Mount]
    public function mount($id)
    {
        if ($id != 0) {
            $post = Post::find($id);
            $this->vid = $post->id;
            $this->title = $post->title;
            $this->body = $post->body;
            $this->image = $post->image;
            $this->user_id = $post->user_id;

        }
    }
    #endregion

    #region[Delete]
    public function set_delete($id): void
    {
        $post = Post::find($id);
        DB::table('comments')->where('post_id', '=', $this->vid)->delete();
        DB::table('likes')->where('post_id', '=', $this->vid)->delete();
        $post->delete();
        $this->redirect(route('posts'));
    }
    #endregion

    #region[Save]
    public function save()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                Post::create([
                    'title' => $this->title,
                    'body' => $this->body,
                    'user_id' => \Auth::id(),
                    'company_id' => session()->get('company_id'),
                    'image' => $this->save_image(),
                ]);
                $this->getRoute();
            } else {
                $post = Post::find($this->vid);
                $post->title = $this->title;
                $post->body = $this->body;
                $post->company_id = session()->get('company_id');
                if ($post->image != $this->image) {
                    $post->image = $this->save_image();
                } else {
                    $post->image = $this->image;
                }

                $post->user_id = \Auth::id();
                $post->save();

                $this->redirect(route('posts'));

            }
        }
    }
    #endregion

    #region[Image]
    public function updatedImage()
    {
        $this->validate([
            'image'=>'image|max:1024',
        ]);

        $this->isUploaded=true;
    }


    public function save_image()
    {
        $image_name=$this->image->getClientOriginalName();
        return $this->image->storeAs('photos',$image_name,'public');
    }
    #endregion

    #region[Route]
    public function getRoute(): void
    {
        $this->redirect(route('posts'));
    }


    public function render()
    {
        return view('livewire.blog.post.upsert')->layout('layouts.web');
    }
    #endregion
}
