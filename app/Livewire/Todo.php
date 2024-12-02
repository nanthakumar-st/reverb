<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 

class Todo extends Component
{
    #[Validate('required')] 
    public $todo = '';

    public function submit()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
