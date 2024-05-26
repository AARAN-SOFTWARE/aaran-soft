<?php

namespace App\Livewire\Webs\Post;

use App\Livewire\Trait\CommonTrait;
use Blog\Blogpost\Model\Blogpost;
use Livewire\Component;

class NewPost extends Component
{
    use CommonTrait;
    public string $title = '';
    public string $body = '';
    public function save()
    {
        if ($this->title != '') {
            if ($this->vid == "") {
                BlogPost::create([
                    'title' => $this->title,
                    'body' => $this->body,
                ]);
//                $message = "Saved";
                $this->getRoute();
            }
        }
    }

    public function getRoute(): void
    {

        $this->redirect(route('blogpost'));
    }


    public function render()
    {
        return view('livewire.webs.home.new-post')->layout('layouts.web');
    }
}
