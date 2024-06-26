<?php

namespace App\Livewire\Webs\Contact;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
//        return view('livewire.webs.contact.contact')->layout('layouts.web');
        return view('components.webs.home.demo.aaransales.contact')->layout('layouts.web');
    }
}
