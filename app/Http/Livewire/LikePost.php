<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public function like() {
        return "Like action taken";
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
