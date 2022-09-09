<?php

namespace App\Http\Livewire;

use App\Models\Messages;
use Livewire\Component;

class Chat extends Component
{
    public $messageText;
    public function render()
    {
        $messages = Messages::with('user')->latest()->take(10)->get()->sortBy('id');
        return view('livewire.chat', [
            'messages' => $messages ,
        ]);
    }

    public function sendMessage(){
        Messages::create([
            'user_id'=>auth()->user()->id,
            'message_text'=> $this->messageText,
        ]);
        $this->reset('messageText');
    }

    public function delete_chat() {
        Messages::truncate();
        $this->reset('messageText');
    }
}
