<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On;

use App\Events\TodoEvent;

class Todo extends Component
{
    #[Validate('required')] 
    public $todo = '';

    public $todos = [];

    #[On('echo:todo-channel,TodoEvent')]
    public function todoList($todo)
    {
        $this->todos[] = $todo['todo'];
    }

    public function submit()
    {
        $this->validate();

        event(new TodoEvent($this->todo));

        $this->todo = '';
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
