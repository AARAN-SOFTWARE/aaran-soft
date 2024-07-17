<?php

namespace App\Livewire\Sports\Web;

use App\Livewire\Trait\CommonTrait;
use Livewire\Component;

class News extends Component
{
    use CommonTrait;

    public $news;

    public function getNews()
    {
        $this->news=\Aaran\SportsClub\Models\News::latest()->get();

    }

    public function render()
    {
        $this->getNews();
        return view('livewire.sports.web.news')->layout('layouts.web');
    }
}
