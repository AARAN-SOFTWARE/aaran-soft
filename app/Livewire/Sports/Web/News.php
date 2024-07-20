<?php

namespace App\Livewire\Sports\Web;

use Aaran\Web\Models\Feed;
use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class News extends Component
{
    use CommonTrait;

    public $news;

    public function getNews()
    {
        $this->news=Feed::where('tag_id',4)->latest()->get();
    }

    public function render()
    {
        $this->getNews();
        return view('livewire.sports.web.news')->layout('layouts.web');
    }
}
