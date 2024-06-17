<?php

namespace App\Livewire\Webs\Contact;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.webs.contact.contact')->layout('layouts.web');
    }
}
