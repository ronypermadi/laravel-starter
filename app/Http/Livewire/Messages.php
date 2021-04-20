<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class Messages extends Component
{
    public $getMessages;

    public function mount ()
    {
        $this->getMessages = Message::with('user')->get();
        // dd($this->allMenus);
    }

    public function render()
    {
        return view('livewire.messages');
    }
}
